<?php

namespace App\Http\Controllers\Backend\Category;

use App\Events\Backend\Category\CategoryCreated;
use App\Events\Backend\Category\CategoryDeleted;
use App\Events\Backend\Category\CategoryUpdated;
use App\Exceptions\GeneralException;
use App\Http\Requests\Backend\Category\StoreCategoryRequest;
use App\Http\Requests\Backend\Category\UpdateCategoryRequest;
use App\Models\Category\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catList = Category::all();
        $res = [];
        foreach ($catList as $cat) {
            $parentId = '#';
            if ($cat->isRoot() == false) {
                $parentId = $cat->getParentId();
            }
            $res[] = [
                'id' => $cat->id,
                'parent' => $parentId,
                'text' => $cat->name,
                'state' => ['opened' => true]
            ];
        }

        return view('backend.categories.index', [
            "categoryList" => json_encode($res)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param  int $p_id
     *
     * @return \Illuminate\Http\Response
     */
    public function create($p_id = null)
    {

        return view('backend.categories.create', ['p_id' => $p_id]);
    }

    /**
     * @param StoreCategoryRequest $request
     *
     * @return mixed
     */
    public function store(StoreCategoryRequest $request)
    {
        $p_id = $request->p_id;
        if (Category::isValidNestedSet() == true) {
            $cat = new Category;
            $cat->name = $request->name;
            $cat->name_ru = $request->name_ru;
            $cat->name_it = $request->name_it;
            $cat->image = $request->image;

            if ($p_id != null) {
                $root = Category::find($p_id);
                if ($root->getDepth() > 0) {
                    return redirect()->route('admin.category.index')->withErrors(trans('exceptions.backend.access.category.create_depth'));
                }
                $cat->parent_id = $p_id;
            }
            if ($cat->save()) {
                event(new CategoryCreated($cat));
            }
            return redirect()->route('admin.category.index')->withFlashSuccess(trans('alerts.backend.category.created'));
        }

        throw new GeneralException(trans('exceptions.backend.access.category.create_error'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $p_id
     * @return \Illuminate\Http\Response
     */
    public function edit($p_id)
    {
        $cat = Category::find($p_id);

        return view('backend.categories.edit', ['category' => $cat]);
    }

    /**
     * @param UpdateCategoryRequest $request
     * @param Category $category
     *
     * @return mixed
     */
    public function update(Category $category, UpdateCategoryRequest $request)
    {
        $category->name = $request->name;
        $category->name_ru = $request->name_ru;
        $category->name_it = $request->name_it;
        $category->image = $request->image;

        if ($category->save()) {
            event(new CategoryUpdated($category));
        }

        return redirect()->route('admin.category.index')->withFlashSuccess(trans('alerts.backend.category.updated'));

    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::find($id);
        $imgName = $cat->image;
        if ($cat->children()->get()->isEmpty()) {
            $cat->delete();
            event(new CategoryDeleted($cat));
            $this->deleteImg($imgName);
            return redirect()->route('admin.category.index')->withFlashSuccess(trans('alerts.backend.category.deleted'));
        } else {
            throw new GeneralException(trans('exceptions.backend.access.category.delete_with_children'));
        }


    }
}

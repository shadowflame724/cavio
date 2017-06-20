<?php

namespace App\Http\Controllers\Backend\Category;

use App\Events\Backend\Category\CategoryCreated;
use App\Events\Backend\Category\CategoryDeleted;
use App\Events\Backend\Category\CategoryUpdated;
use App\Exceptions\GeneralException;
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
    public function create(Request $request, $p_id = null)
    {
        if ($request->isMethod("POST")) {

            $this->validate(\request(), [
                'name' => "required|min:3|max:191"
            ]);
            $catName = \request('name');
            $p_id = \request('p_id');
            $imageName = $request->photo;
            if (Category::isValidNestedSet() == true) {

                $cat = Category::create([
                    'name' => $catName,
                    'image' => $imageName,
                    $this->moveImg($imageName)
                ]);
                if ($p_id != null) {
                    $root = Category::find($p_id);
                    $cat->makeChildOf($root);
                }
                event(new CategoryCreated($cat));
                return redirect()->route('admin.category.index')->withFlashSuccess(trans('alerts.backend.category.created'));
            }

        }
        return view('backend.categories.create', ['p_id' => $p_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $p_id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $p_id)
    {
        $cat = Category::find($p_id);
        $oldName = $cat->image;

        if ($request->isMethod("POST")) {

            $this->validate(\request(), [
                'name' => "required|min:3|max:191"
            ]);
            $imageName = $request->photo;

            $cat->name = \request('name');
            $cat->image = $request->photo;

            if ($cat->save()) {
                event(new CategoryUpdated($cat));
                $this->moveImg($imageName, $oldName);

            }

            return redirect()->route('admin.category.index')->withFlashSuccess(trans('alerts.backend.category.updated'));
        }

        return view('backend.categories.edit', ['category' => $cat]);
    }

    /**
     * Remove the specified resource from storage.
     *
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

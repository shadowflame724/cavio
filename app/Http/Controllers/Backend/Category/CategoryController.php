<?php

namespace App\Http\Controllers\Backend\Category;

use App\Models\Category\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
                'name' => "required|min:3|max:191",
                'file' => 'image|mimes:jpeg,bmp,png',
            ]);
            $imageName = null;

            if(\request('file') != null) {
                $imageName = time() . '.' . $request->file->getClientOriginalExtension();
                $request->file->move(public_path('img/backend/categories/'), $imageName);
            }
            $catName = \request('name');
            $p_id = \request('p_id');
            if (Category::isValidNestedSet() == true) {

                $cat = Category::create([
                    'name' => $catName,
                    'image' => $imageName
                ]);
                if ($p_id != null) {
                    $root = Category::find($p_id);
                    $cat->makeChildOf($root);
                }
            };

            return redirect()->route('admin.category.index')->withFlashSuccess(trans('alerts.backend.category.created'));
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

        if ($request->isMethod("POST")) {
            $this->validate(\request(), [
                'name' => "required|min:3|max:191",
                'file' => 'image|mimes:jpeg,bmp,png',
            ]);
            $imageName = $cat->image;
            if(\request('file') != null) {
                if($imageName == null){
                    $imageName = time() . '.' . $request->file->getClientOriginalExtension();
                }
                $request->file->move(public_path('img/backend/categories/'), $imageName);
            }

            $cat->name = \request('name');
            $cat->image = $imageName;
            $cat->save();

            return redirect()->route('admin.category.index')->withFlashSuccess(trans('alerts.backend.category.edited'));
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

        $cat->delete();
        return redirect()->route('admin.category.index')->withFlashSuccess(trans('alerts.backend.category.deleted'));
    }
}

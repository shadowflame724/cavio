<?php

namespace App\Http\Controllers\Backend\Access\Page;

use App\Models\Access\Page\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\Page\StorePageRequest;
use App\Http\Requests\Backend\Access\Page\ManagePageRequest;
use App\Http\Requests\Backend\Access\Page\UpdatePageRequest;
use Illuminate\Support\Facades\Input;
use kix\mdash\EMT_lib as Typograph;

/**
 * Class RoleController.
 */
class PageController extends Controller
{

    public function index(ManagePageRequest $request)
    {
        //$pages = Datatables::of(Page::all())->make(true);

        return view('backend.access.pages.index');
    }

    public function create(ManagePageRequest $request)
    {
        return view('backend.access.pages.create');
    }

    public function store(StorePageRequest $request)
    {
        $this->validate(\request(), [
            'pageKey' => "required|min:3|max:191",
            'title' => "required|min:3|max:191",
            'body' => "required|min:3",
            'prev' => "required|min:3",
            'description' => "required",
            'file' => 'image|mimes:jpeg,bmp,png',
        ]);
        $body = request('body');
        $prev = request('prev');

        $typograph = new Typograph();
        $options = array(
            'Text.paragraphs'=>'off',
            'OptAlign.oa_oquote'=>'off'
        );
        $typograph->setup($options);

        $typograph->set_text($body);
        $body = $typograph->apply();

        $typograph->set_text($prev);
        $prev = $typograph->apply();

        $body = clean($body);
        $prev = clean($prev);


        $imageName = null;
        if(\request('file') != null) {
            $imageName = time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('img/backend/pages/'), $imageName);
        }


        Page::create([
            'pageKey' => \request('pageKey'),
            'title' => \request('title'),
            'description' => \request('description'),
            'prev' => $prev,
            'body' => $body,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.access.page.index')->withFlashSuccess("Page created");
    }

    public function show(Page $page)
    {
        return view('backend.access.pages.edit', ['page' => $page]);
    }

    /**
     * @param Page $page
     * @param ManagePageRequest $request
     *
     * @return mixed
     */
    public function edit(Page $page)
    {
        return view('backend.access.pages.edit', ['page' => $page]);
    }

    /**
     * @param Page $page
     * @param UpdatePageRequest $request
     *
     * @return mixed
     */
    public function update(Page $page, UpdatePageRequest $request)
    {
        $this->validate(\request(), [
            'pageKey' => "required|min:3|max:191",
            'title' => "required|min:3|max:191",
            'body' => "required|min:3",
            'prev' => "required|min:3",
            'description' => "required",
            'file' => 'image|mimes:jpeg,bmp,png',
        ]);
        $body = clean(Input::get('body'));
        $prev = clean(Input::get('prev'));
        //$md = new EMT
        $imageName = $page->image;
        if(\request('file') != null) {
            if($imageName == null){
                $imageName = time() . '.' . $request->file->getClientOriginalExtension();
            }
            $request->file->move(public_path('img/backend/pages/'), $imageName);
        }

        $page->pageKey = \request('pageKey');
        $page->title = \request('title');
        $page->description = \request('description');
        $page->prev = $prev;
        $page->body = $body;
        $page->image = $imageName;
        $page->save();

        return redirect()->route('admin.access.page.index')->withFlashSuccess("Page edited");
    }

    /**
     * @param Page $page
     * @param ManagePageRequest $request
     *
     * @return mixed
     */
    public function destroy(Page $page, ManagePageRequest $request)
    {
        $fileName = public_path('img/backend/pages/') . $page->image;
        if (file_exists($fileName)) {
            unlink($fileName);
        }
        $page->delete();
        return redirect()->route('admin.access.page.index')->withFlashSuccess("Page deleted");
    }
}

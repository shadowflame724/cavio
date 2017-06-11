<?php

namespace App\Http\Controllers\Backend\Page;

use App\Models\Page\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Page\StorePageRequest;
use App\Http\Requests\Backend\Page\ManagePageRequest;
use App\Http\Requests\Backend\Page\UpdatePageRequest;
use App\Repositories\Backend\Page\PageRepository;

/**
 * Class RoleController.
 */
class PageController extends Controller
{

    /**
     * @var PageRepository
     */
    protected $page;

    /**
     * @param PageRepository $page
     */
    public function __construct(PageRepository $page)
    {
        $this->page = $page;
    }

    /**
     * @param ManagePageRequest $request
     *
     * @return mixed
     */
    public function index(ManagePageRequest $request)
    {
        return view('backend.pages.index');
    }

    /**
     * @param ManagePageRequest $request
     *
     * @return mixed
     */
    public function create(ManagePageRequest $request)
    {
        return view('backend.pages.create');
    }

    /**
     * @param Page $page
     * @param StorePageRequest $request
     *
     * @return mixed
     */
    public function store(StorePageRequest $request)
    {
        $this->page->create($request->only('pageKey', 'title', 'description', 'body'));

        return redirect()->route('admin.page.index')->withFlashSuccess(trans('alerts.backend.page.created'));
    }

    /**
     * @param Page $page
     * @param ManagePageRequest $request
     *
     * @return mixed
     */
    public function edit(Page $page, ManagePageRequest $request)
    {
        return view('backend.pages.edit', [
            'page' => $page,
        ]);
    }

    /**
     * @param Page $page
     * @param UpdatePageRequest $request
     *
     * @return mixed
     */
    public function update(Page $page, UpdatePageRequest $request)
    {
        $this->page->update($page, $request->only('pageKey', 'title', 'description', 'body'));

        return redirect()->route('admin.page.index')->withFlashSuccess(trans('alerts.backend.page.updated'));
    }

    /**
     * @param Page $page
     * @param ManagePageRequest $request
     *
     * @return mixed
     */
    public function destroy(Page $page, ManagePageRequest $request)
    {
        $this->page->delete($page);

        return redirect()->route('admin.page.index')->withFlashSuccess(trans('alerts.backend.page.deleted'));
    }
}

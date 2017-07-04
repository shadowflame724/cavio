<?php

namespace App\Http\Controllers\Backend\Page;

use App\Models\Block\Block;
use App\Models\Page\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Page\StorePageRequest;
use App\Http\Requests\Backend\Page\ManagePageRequest;
use App\Http\Requests\Backend\Page\UpdatePageRequest;
use App\Repositories\Backend\Page\PageRepository;
use EMT\EMTypograph;


/**
 * Class PageController.
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

        $this->page->create($request->only('pageKey', 'title', 'title_ru', 'title_it', 'description', 'body', 'body_ru', 'body_it'));

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
        $blocks = $request['blocks'];

        foreach ($blocks as $key => $newblock) {
            $oldBlock = Block::find($newblock['id']);
            $oldImage = $oldBlock->image;
            $oldBlock->title = $newblock['title'];
            $oldBlock->title_ru = $newblock['title_ru'];
            $oldBlock->title_it = $newblock['title_it'];
            $oldBlock->body = /*EMTypograph::fast_apply(*/
                clean($newblock['body']);
            $oldBlock->body = /*EMTypograph::fast_apply(*/
                clean($newblock['body_ru']);
            $oldBlock->body = /*EMTypograph::fast_apply(*/
                clean($newblock['body_it']);
            $oldBlock->image = $newblock['photo'];
            if ($oldBlock->save()) {
                $this->moveImg($newblock['photo'], $oldImage);
            }
        }

        $this->page->update($page, $request->only('pageKey', 'title', 'title_ru', 'title_it', 'description', 'body', 'body_ru', 'body_it'));

        return redirect()->route('admin.page.index')->withFlashSuccess(trans('alerts.backend.page.updated'));
    }

}

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
use Validator;


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

        $this->page->create($request->only( 'title', 'title_ru', 'title_it', 'description', 'body', 'body_ru', 'body_it', 'admin_comment'));

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
        $messages = '';
        $flag = true;

        if ($blocks != null) {
            foreach ($blocks as $key => $newBlock) {
                $bodyCleaned = /*EMTypograph::fast_apply(*/
                    clean($newBlock['body']);
                $bodyRuCleaned = /*EMTypograph::fast_apply(*/
                    clean($newBlock['body_ru']);
                $bodyItCleaned = /*EMTypograph::fast_apply(*/
                    clean($newBlock['body_it']);

                $oldBlock = Block::find($newBlock['id']);

                if ($oldBlock->title_limit != null) {

                    $validator = Validator::make($newBlock, [
                        'title' => 'required|max:' . $oldBlock->title_limit,
                        'title_ru' => 'required|max:' . $oldBlock->title_limit,
                        'title_it' => 'required|max:' . $oldBlock->title_limit,
                    ]);

                    foreach ($validator->errors()->messages() as $message) {
                        foreach ($message as $item) {
                            $messages .= 'Block ' . $key . ' ' . $item . '<br>';
                            $flag = false;
                        }
                    }
                }

                if ($oldBlock->body_limit != null) {

                    $validator = Validator::make($newBlock, [
                        'body' => 'required|max:' . $oldBlock->body_limit,
                        'body_ru' => 'required|max:' . $oldBlock->body_limit,
                        'body_it' => 'required|max:' . $oldBlock->body_limit,
                    ]);

                    foreach ($validator->errors()->messages() as $message) {
                        foreach ($message as $item) {
                            $messages .= 'Block ' . $key . ' ' . $item . '<br>';
                            $flag = false;
                        }
                    }
                }

                $oldImage = $oldBlock->image;
                $oldBlock->title = $newBlock['title'];
                $oldBlock->title_ru = $newBlock['title_ru'];
                $oldBlock->title_it = $newBlock['title_it'];
                $oldBlock->body = $bodyCleaned;
                $oldBlock->body_ru = $bodyRuCleaned;
                $oldBlock->body_it = $bodyItCleaned;
                $oldBlock->image = $newBlock['photo'];

                if ($flag == true) {
                    if ($oldBlock->save()) {
                        $this->moveImg($newBlock['photo'], $oldImage);
                    }
                }
            }
        }

        if ($flag == false) {
            return redirect()->route('admin.page.edit', $page)->withErrors($messages);
        }


        $this->page->update($page, $request->only( 'title', 'title_ru', 'title_it', 'description', 'body', 'body_ru', 'body_it', 'admin_comment'));

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
<?php

namespace App\Http\Controllers\Backend\Block;

use App\Models\Block\Block;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Block\StoreBlockRequest;
use App\Http\Requests\Backend\Block\ManageBlockRequest;
use App\Http\Requests\Backend\Block\UpdateBlockRequest;
use App\Models\Page\Page;
use App\Repositories\Backend\Block\BlockRepository;

/**
 * Class BlockController.
 */
class BlockController extends Controller
{

    /**
     * @var BlockRepository
     */
    protected $block;

    /**
     * @param BlockRepository $block
     */
    public function __construct(BlockRepository $block)
    {
        $this->block = $block;
    }

    /**
     * @param ManageBlockRequest $request
     *
     * @return mixed
     */
    public function index(ManageBlockRequest $request)
    {
        return view('backend.blocks.index');
    }

    /**
     * @param ManageBlockRequest $request
     *
     * @return mixed
     */
    public function create(ManageBlockRequest $request, Page $page)
    {
        return view('backend.blocks.create', [
            'page' => $page
        ]);
    }

    /**
     * @param StoreBlockRequest $request
     * @param Page $page
     *
     * @return mixed
     */
    public function store(StoreBlockRequest $request, Page $page)
    {
        $this->block->create($request->only('page', 'title', 'preview', 'body', 'image'), $page);

        $this->moveImg($request->image);

        return redirect()->route('admin.page.edit', $page)->withFlashSuccess(trans('alerts.backend.block.created'));
    }

    /**
     * @param Page $page
     * @param Block $block
     * @param ManageBlockRequest $request
     *
     * @return mixed
     */
    public function edit(Page $page, Block $block, ManageBlockRequest $request)
    {
        return view('backend.blocks.edit', [
            'block' => $block,
            'page' => $page,
        ]);
    }

    /**
     * @param Page $page
     * @param Block $block
     * @param UpdateBlockRequest $request
     *
     * @return mixed
     */
    public function update(Page $page, Block $block, UpdateBlockRequest $request)
    {
        $oldName = $block->image;

        $this->block->update($block, $request->only('title', 'preview', 'body', 'image'));

        $this->moveImg($request->image, $oldName);

        return redirect()->route('admin.page.edit', $block->page())->withFlashSuccess(trans('alerts.backend.block.updated'));
    }

    /**
     * @param Page $page
     * @param Block $block
     * @param ManageBlockRequest $request
     *
     * @return mixed
     */
    public function destroy(Page $page, Block $block, ManageBlockRequest $request)
    {
        $imgName = $block->image;

        $this->block->delete($block);
        $this->deleteImg($imgName);

        return redirect()->route('admin.page.edit', $block->page())->withFlashSuccess(trans('alerts.backend.block.deleted'));
    }
}

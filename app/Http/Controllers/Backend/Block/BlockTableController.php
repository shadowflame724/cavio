<?php

namespace App\Http\Controllers\Backend\Block;

use App\Http\Controllers\Controller;
use App\Models\Block\Block;
use App\Models\Page\Page;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Block\BlockRepository;
use App\Http\Requests\Backend\Block\ManageBlockRequest;

/**
 * Class BlockTableController.
 */
class BlockTableController extends Controller
{
    /**
     * @var BlockRepository
     */
    protected $blocks;

    /**
     * @param BlockRepository $blocks
     */
    public function __construct(BlockRepository $blocks)
    {
        $this->blocks = $blocks;
    }

    /**
     * @param ManageBlockRequest $request
     * @param Page $page
     *
     * @return mixed
     */
    public function __invoke(ManageBlockRequest $request, Page $page)
    {
        return Datatables::of($this->blocks->getForDataTable($page))
            ->addColumn('actions', function ($block) {
                return '<a href="'.route('admin.page.block.edit', array('id' => $block->page->id, 'block' => $block->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                
                <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find("form").submit();"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
<form action="'.route('admin.page.block.destroy', array('page' => $block->page_id, 'block' => $block->id)).'"  method="POST" name="delete_item" style="display:none">
   <input type="hidden" name="_method" value="delete">
   <input type="hidden" name="_token" value="'.csrf_token().'">
</form>
</a>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}

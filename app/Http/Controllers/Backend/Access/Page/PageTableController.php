<?php

namespace App\Http\Controllers\Backend\Access\Page;

use App\Http\Controllers\Controller;
use App\Models\Access\Page\Page;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Access\Page\PageRepository;
use App\Http\Requests\Backend\Access\Page\ManagePageRequest;

/**
 * Class PageTableController.
 */
class PageTableController extends Controller
{
    /**
     * @var PageRepository
     */
    protected $pages;

    /**
     * @param PageRepository $pages
     */
    public function __construct(PageRepository $pages)
    {
        $this->pages = $pages;
    }

    /**
     * @param ManagePageRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePageRequest $request)
    {
        $pages = Page::select(['id', 'pageKey', 'title', 'description', 'image']);

        return Datatables::of($pages)
            ->addColumn('actions', function ($page) {
                return '
                <a href="page/'.$page->id.'/edit" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find("form").submit();"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
<form action="page/'.$page->id.'" method="POST" name="delete_item" style="display:none">
   <input type="hidden" name="_method" value="delete">
   <input type="hidden" name="_token" value="">
</form>
</a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}

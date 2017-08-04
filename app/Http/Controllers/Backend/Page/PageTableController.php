<?php

namespace App\Http\Controllers\Backend\Page;

use App\Http\Controllers\Controller;
use App\Models\Page\Page;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Page\PageRepository;
use App\Http\Requests\Backend\Page\ManagePageRequest;

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
        $pages = Page::select(['id', 'slug', 'name', 'name_ru', 'name_it', 'created_at', 'notRemoved']);

        return Datatables::of($pages)
            ->editColumn('created_at', function ($page) {
                return $page->created_at ? with(new Carbon($page->created_at))->format('m/d/Y') : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->addColumn('actions', function ($page) {
                $buttons = '<a href="' . route('admin.page.edit', array('page' => $page->id)) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>';

                if ($page->notRemoved == null) {
                    $buttons .= '<a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find("form").submit();"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
                    <form action="' . route('admin.page.destroy', array('page' => $page->id)) . '"  method="POST" name="delete_item" style="display:none">
   <input type="hidden" name="_method" value="delete">
   <input type="hidden" name="_token" value="' . csrf_token() . '">
</form>';
                }

                return $buttons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}

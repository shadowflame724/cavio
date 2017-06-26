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
        $pages = Page::select(['id', 'slug', 'title', 'created_at']);

        return Datatables::of($pages)
            ->editColumn('created_at', function ($page) {
                return $page->created_at ? with(new Carbon($page->created_at))->format('m/d/Y') : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->addColumn('actions', function ($page) {
                return '<a href="'.route('admin.page.edit', array('page' => $page->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}

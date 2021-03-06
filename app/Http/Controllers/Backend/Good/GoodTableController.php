<?php

namespace App\Http\Controllers\Backend\Good;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Good\GoodRepository;
use App\Http\Requests\Backend\Good\ManageProductRequest;

/**
 * Class GoodTableController.
 */
class GoodTableController extends Controller
{
    /**
     * @var GoodRepository
     */
    protected $good;

    /**
     * @param GoodRepository $good
     */
    public function __construct(GoodRepository $good)
    {
        $this->good = $good;
    }

    /**
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageProductRequest $request)
    {
        return Datatables::of($this->good->getForDataTable())
            ->editColumn('created_at', function ($good) {
                return $good->created_at ? with(new Carbon($good->created_at))->format('m/d/Y') : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->addColumn('actions', function ($good) {
                return '<a href="'.route('admin.good.edit', array('good' => $good->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>

                <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find("form").submit();"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
<form action="'.route('admin.good.destroy', array('good' => $good->id)).'"  method="POST" name="delete_item" style="display:none">
   <input type="hidden" name="_method" value="delete">
   <input type="hidden" name="_token" value="'.csrf_token().'">
</form>
</a>';
            })
            ->rawColumns(['actions', 'banner'])
            ->make(true);
    }
}

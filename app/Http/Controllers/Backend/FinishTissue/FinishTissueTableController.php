<?php

namespace App\Http\Controllers\Backend\FinishTissue;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\FinishTissue\FinishTissueRepository;
use App\Http\Requests\Backend\FinishTissue\ManageFinishTissueRequest;

/**
 * Class FinishTissueTableController.
 */
class FinishTissueTableController extends Controller
{
    /**
     * @var FinishTissueRepository
     */
    protected $finishTissue;

    /**
     * @param FinishTissueRepository $finishTissue
     */
    public function __construct(FinishTissueRepository $finishTissue)
    {
        $this->finishTissue = $finishTissue;
    }

    /**
     * @param ManageFinishTissueRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageFinishTissueRequest $request)
    {
        return Datatables::of($this->finishTissue->getForDataTable())
            ->editColumn('created_at', function ($finishTissue) {
                return $finishTissue->created_at ? with(new Carbon($finishTissue->created_at))->format('m/d/Y') : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->addColumn('actions', function ($finishTissue) {
                return '<a href="'.route('admin.finish-tissue.edit', array('FinishTissue' => $finishTissue->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                
                <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find("form").submit();"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
<form action="'.route('admin.finish-tissue.destroy', array('FinishTissue' => $finishTissue->id)).'"  method="POST" name="delete_item" style="display:none">
   <input type="hidden" name="_method" value="delete">
   <input type="hidden" name="_token" value="'.csrf_token().'">
</form>
</a>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}

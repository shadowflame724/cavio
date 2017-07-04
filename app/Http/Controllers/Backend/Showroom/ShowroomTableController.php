<?php

namespace App\Http\Controllers\Backend\Showroom;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Showroom\ShowroomRepository;
use App\Http\Requests\Backend\Showroom\ManageShowroomRequest;

/**
 * Class ShowroomTableController.
 */
class ShowroomTableController extends Controller
{
    /**
     * @var ShowroomRepository
     */
    protected $showroom;

    /**
     * @param ShowroomRepository $showroom
     */
    public function __construct(ShowroomRepository $showroom)
    {
        $this->showroom = $showroom;
    }

    /**
     * @param ManageShowroomRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageShowroomRequest $request)
    {
        return Datatables::of($this->showroom->getForDataTable())
            ->addColumn('actions', function ($showroom) {
                return '<a href="'.route('admin.showroom.edit', array('showroom' => $showroom->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                
                <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find("form").submit();"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
<form action="'.route('admin.showroom.destroy', array('showroom' => $showroom->id)).'"  method="POST" name="delete_item" style="display:none">
   <input type="hidden" name="_method" value="delete">
   <input type="hidden" name="_token" value="'.csrf_token().'">
</form>
</a>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}

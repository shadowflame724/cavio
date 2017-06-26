<?php

namespace App\Http\Controllers\Backend\Zone;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Zone\ZoneRepository;
use App\Http\Requests\Backend\Zone\ManageZoneRequest;

/**
 * Class ZoneTableController.
 */
class ZoneTableController extends Controller
{
    /**
     * @var ZoneRepository
     */
    protected $zone;

    /**
     * @param ZoneRepository $zone
     */
    public function __construct(ZoneRepository $zone)
    {
        $this->zone = $zone;
    }

    /**
     * @param ManageZoneRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageZoneRequest $request)
    {
        return Datatables::of($this->zone->getForDataTable())
            ->editColumn('created_at', function ($zone) {
                return $zone->created_at ? with(new Carbon($zone->created_at))->format('m/d/Y') : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->addColumn('actions', function ($zone) {
                return '<a href="'.route('admin.zone.edit', array('zone' => $zone->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                
                <a data-method="delete" data-trans-button-cancel="Cancel" data-trans-button-confirm="Delete" data-trans-title="Are you sure you want to do this?" class="btn btn-xs btn-danger" style="cursor:pointer;" onclick="$(this).find("form").submit();"><i class="fa fa-times" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
<form action="'.route('admin.zone.destroy', array('zone' => $zone->id)).'"  method="POST" name="delete_item" style="display:none">
   <input type="hidden" name="_method" value="delete">
   <input type="hidden" name="_token" value="'.csrf_token().'">
</form>
</a>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}

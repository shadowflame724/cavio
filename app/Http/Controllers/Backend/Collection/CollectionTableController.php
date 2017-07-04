<?php

namespace App\Http\Controllers\Backend\Collection;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Collection\CollectionRepository;
use App\Http\Requests\Backend\Collection\ManageCollectionRequest;

/**
 * Class CollectionTableController.
 */
class CollectionTableController extends Controller
{
    /**
     * @var CollectionRepository
     */
    protected $collection;

    /**
     * @param CollectionRepository $collection
     */
    public function __construct(CollectionRepository $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param ManageCollectionRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageCollectionRequest $request)
    {
        return Datatables::of($this->collection->getForDataTable())
            ->editColumn('created_at', function ($collection) {
                return $collection->created_at ? with(new Carbon($collection->created_at))->format('m/d/Y') : '';
            })
            ->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
            })
            ->addColumn('actions', function ($collection) {
                return view('backend.collection.collectionTableButtons', ['collection' => $collection]);
            })
            ->editColumn('banner', '
            @if($banner == 1)
            <span class="glyphicon glyphicon-ok"></span>
            @else
            <span class="glyphicon glyphicon-remove"></span>
            @endif
            ')
            ->rawColumns(['actions', 'banner'])
            ->make(true);
    }
}

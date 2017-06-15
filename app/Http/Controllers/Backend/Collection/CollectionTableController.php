<?php

namespace App\Http\Controllers\Backend\Collection;

use App\Http\Controllers\Controller;
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
            ->addColumn('actions', function ($collection) {
                return '<a href="'.route('admin.collection.edit', array('collection' => $collection->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                <a href="'.route('admin.collection.marker.edit', array('collection' => $collection->id)).'" class="btn btn-xs btn-primary"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Marker\'s editor"></i></a>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}

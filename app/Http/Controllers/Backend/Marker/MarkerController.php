<?php

namespace App\Http\Controllers\Backend\Marker;

use App\Models\Marker\Marker;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Marker\StoreMarkerRequest;
use App\Http\Requests\Backend\Marker\ManageMarkerRequest;
use App\Http\Requests\Backend\Marker\UpdateMarkerRequest;
use App\Models\Collection\Collection;
use App\Repositories\Backend\Marker\MarkerRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class MarkerController.
 */
class MarkerController extends Controller
{

    /**
     * @var MarkerRepository
     */
    protected $marker;

    /**
     * @param MarkerRepository $marker
     */
    public function __construct(MarkerRepository $marker)
    {
        $this->marker = $marker;
    }

    /**
     * @param ManageMarkerRequest $request
     * @param Collection $collection
     * @return mixed
     */
    public function create(ManageMarkerRequest $request, Collection $collection)
    {
        $arr = Marker::where('collection_id', $collection->id)->get();
        $markers = [];
        foreach ($arr as $marker) {
            $markers[] = [
                'x' => $marker->x,
                'y' => $marker->y,
                'note' => $marker->title,
            ];
        }

        return view('backend.markers.create', [
            'collection' => $collection,
            'markers' => json_encode($markers)
        ]);
    }

    /**
     * @param Request $request
     * @param Collection $collection
     *
     * @return mixed
     */
    public function store(Request $request, Collection $collection)
    {
        Marker::where('collection_id', $collection->id)->delete();

        /*
         * Access to notes array
         */
        dd(\request());
        die();
        foreach ($request->notes as $marker) {
            Marker::created([
                'collection_id' => $collection->id,
                'title' => $marker->title,
                'x' => $marker->x,
                'y' => $marker->y,
            ]);
        }

        return redirect()->route('admin.collection.index')->withFlashSuccess(trans('alerts.backend.marker.updated'));
    }
}

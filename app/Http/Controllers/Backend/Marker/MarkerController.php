<?php

namespace App\Http\Controllers\Backend\Marker;

use App\Http\Requests\Backend\Marker\UpdateMarkerRequest;
use App\Models\Collection\Collection;
use App\Models\Marker\Marker;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Facades\Datatables;
use EMT\EMTypograph;

class MarkerController extends Controller
{
    public function index()
    {
        return view('backend.markers.index');
    }

    public function show(Marker $marker)
    {
        return view('backend.markers.show', compact('Marker'));
    }


    public function create(Collection $collection)
    {
        return view('backend.markers.create', [
            'collection' => $collection
        ]);
    }

    /**
     * @param Collection $collection
     *
     * @return mixed
     */
    public function store(Collection $collection)
    {
        Marker::create([
            'collection_id' => $collection->id,
            'title' => "Default title",
            'title_ru' => "Default title",
            'title_it' => "Default title",

            'code' => "#00001",
            'x' => 0.3,
            'y' => 0.5,
        ]);

        return redirect()->route('admin.collection.marker.edit', $collection)->withFlashSuccess(trans('alerts.backend.marker.created'));

    }

    /**
     * @param Collection $collection
     *
     * @return mixed
     */
    public function edit(Collection $collection)
    {
        return view('backend.markers.edit', [
            'collection' => $collection,
        ]);
    }

    /**
     * @param Collection $collection
     * @param UpdateMarkerRequest $request
     *
     * @return mixed
     */
    public function update(Collection $collection, UpdateMarkerRequest $request)
    {
        $markers = $request->markers;

        foreach ($markers as $key => $newMarker) {
            $oldMarker = Marker::find($newMarker['id']);
            $oldMarker->code = $newMarker['code'];
            $oldMarker->title = $newMarker['title'];
            $oldMarker->title_ru = $newMarker['title_ru'];
            $oldMarker->title_it = $newMarker['title_it'];
            $oldMarker->x = $newMarker['x'];
            $oldMarker->y = $newMarker['y'];
            $oldMarker->save();
        }

        return redirect()->route('admin.collection.marker.edit', $oldMarker->collection)->withFlashSuccess(trans('alerts.backend.marker.updated'));
    }

    /**
     * @param Marker $marker
     *
     * @return mixed
     */
    public function destroy(Marker $marker)
    {
        $collection = $marker->collection;

        $marker->delete();

        return redirect()->route('admin.collection.marker.edit', $collection)->withFlashSuccess(trans('alerts.backend.marker.deleted'));
    }

}
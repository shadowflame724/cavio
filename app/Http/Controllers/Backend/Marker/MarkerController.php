<?php

namespace App\Http\Controllers\Backend\Marker;

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
            'title' => "Default tile",
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
     * @param Request $request
     *
     * @return mixed
     */
    public function update(Collection $collection, Request $request)
    {
        $markers = $request->markers;

        foreach ($markers as $key => $newMarker) {
            validator($newMarker, [
                $newMarker['code'] => 'required|max:10',
                $newMarker['title'] => 'required|max:32'
            ]);

            $oldMarker = Marker::find($newMarker['id']);
            $oldMarker->update($newMarker);
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
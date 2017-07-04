<?php

namespace App\Http\Controllers\Backend\CollectionZone;

use App\Http\Controllers\Controller;
use App\Models\Collection\Collection;
use App\Models\CollectionZone\CollectionZone;
use Illuminate\Http\Request;

class CollectionZoneController extends Controller
{
    /**
     * @param Collection $collection
     *
     * @return mixed
     */
    public function store(Collection $collection)
    {
        CollectionZone::create([
            'title' => "Default title",
            'title_ru' => "Default title",
            'title_it' => "Default title",

            'collection_id' => $collection->id,
        ]);

        return redirect()->route('admin.collection.edit', $collection)->withFlashSuccess(trans('alerts.backend.collection.zones.created'));

    }

    /**
     * @param CollectionZone $collectionZones
     *
     * @return mixed
     */
    public function destroy(CollectionZone $collectionZones)
    {
        $collection = $collectionZones->collection;
        $collectionZones->delete();

        return redirect()->route('admin.collection.edit', $collection)->withFlashSuccess(trans('alerts.backend.collection.zones.deleted'));
    }
}

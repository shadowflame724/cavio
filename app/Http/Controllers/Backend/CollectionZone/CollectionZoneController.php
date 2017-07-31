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
            'name' => "Default name",
            'name_ru' => "Default name",
            'name_it' => "Default name",
            'description' => "Default description",
            'description_ru' => "Default description",
            'description_it' => "Default description",

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
        $imageArray = explode(',', $collectionZones->image);
        if($collectionZones->delete()){
            foreach ($imageArray as $image){
                $this->deleteThreeSizeImg($image, 'zone');
            }
        }

        return redirect()->route('admin.collection.edit', $collection)->withFlashSuccess(trans('alerts.backend.collection.zones.deleted'));
    }
}

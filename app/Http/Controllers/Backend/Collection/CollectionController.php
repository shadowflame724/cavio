<?php

namespace App\Http\Controllers\Backend\Collection;

use App\Http\Requests\Backend\Collection\ManageCollectionRequest;
use App\Http\Requests\Backend\Collection\UpdateCollectionRequest;
use App\Http\Requests\Backend\Collection\StoreCollectionRequest;
use App\Models\Collection\Collection;
use App\Http\Controllers\Controller;
use App\Models\CollectionZone\CollectionZone;
use App\Models\Zone\Zone;
use App\Repositories\Backend\Collection\CollectionRepository;

class CollectionController extends Controller
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
    public function index(ManageCollectionRequest $request)
    {
        return view('backend.collection.index');
    }

    /**
     * @param ManageCollectionRequest $request
     *
     * @return mixed
     */
    public function create(ManageCollectionRequest $request)
    {
        return view('backend.collection.create');
    }

    /**
     * @param StoreCollectionRequest $request
     *
     * @return mixed
     */
    public function store(StoreCollectionRequest $request)
    {
        $this->collection->create($request->all());
        $this->moveThreeSizeImg($request->photo);

        return redirect()->route('admin.collection.index')->withFlashSuccess(trans('alerts.backend.collection.created'));
    }

    /**
     * @param Collection $collection
     * @param ManageCollectionRequest $request
     *
     * @return mixed
     */
    public function edit(Collection $collection, ManageCollectionRequest $request)
    {
        $zones = Zone::all();

        return view('backend.collection.edit', [
            'collection' => $collection,
            'mainZones' => $zones
        ]);
    }

    /**
     * @param Collection $collection
     * @param UpdateCollectionRequest $request
     *
     * @return mixed
     */
    public function update(Collection $collection, UpdateCollectionRequest $request)
    {
        $zones = $request->zones;

        if ($zones != null) {
            foreach ($zones as $key => $newzone) {
                $oldzone = CollectionZone::find($newzone['id']);

                $oldImage = $oldzone->image;
                $oldzone->title = $newzone['title'];
                $oldzone->title_ru = $newzone['title_ru'];
                $oldzone->title_it = $newzone['title_it'];
                $oldzone->image = $newzone['photo'];
                $oldzone->zone_id = $newzone['zone_id'];

                if ($oldzone->save()) {
                    $newImagesArray = explode(',', $newzone['photo']);
                    $oldImagesArray = explode(',', $oldImage);
                    //dd($newImagesArray, $oldImagesArray, strlen($oldImagesArray[0]));

                    foreach (array_diff($newImagesArray, $oldImagesArray) as $image) {
                        $this->moveThreeSizeImg($image, null, 'zone');
                    }

                    if (strlen($oldImagesArray[0]) > 0) {
                        foreach (array_diff($oldImagesArray, $newImagesArray) as $image) {
                            $this->deleteThreeSizeImg($image, 'zone');
                        }
                    }
                }
            }
        }
        $oldName = $collection->image;
        $this->collection->update($collection, $request->only('banner', 'title', 'title_ru', 'title_it', 'description', 'description_ru', 'description_it', 'photo'));
        $this->moveThreeSizeImg($request->photo, $oldName);

        return redirect()->route('admin.collection.index')->withFlashSuccess(trans('alerts.backend.collection.updated'));
    }

    /**
     * @param Collection $collection
     * @param ManageCollectionRequest $request
     *
     * @return mixed
     */
    public function destroy(Collection $collection, ManageCollectionRequest $request)
    {
        $imgName = $collection->image;
        $this->collection->delete($collection);
        $this->deleteThreeSizeImg($imgName);

        return redirect()->route('admin.collection.index')->withFlashSuccess(trans('alerts.backend.collection.deleted'));
    }
}

<?php

namespace App\Http\Controllers\Backend\Collection;

use App\Http\Requests\Backend\Collection\ManageCollectionRequest;
use App\Http\Requests\Backend\Collection\UpdateCollectionRequest;
use App\Http\Requests\Backend\Collection\StoreCollectionRequest;
use App\Models\Collection\Collection;
use App\Http\Controllers\Controller;
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
        $this->collection->create($request->only('title', 'description', 'image'));

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
        return view('backend.collection.edit', [
            'Collection' => $collection,
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
        $this->collection->update($collection, $request->only('title', 'description', 'image'));

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
        $this->collection->delete($collection);

        return redirect()->route('admin.collection.index')->withFlashSuccess(trans('alerts.backend.collection.deleted'));
    }
}

<?php

namespace App\Http\Controllers\Backend\Access\Collection;

use App\Events\Backend\Access\Collection\CollectionCreated;
use App\Events\Backend\Access\Collection\CollectionDeleted;
use App\Events\Backend\Access\Collection\CollectionUpdated;
use App\Http\Requests\Backend\Access\Collection\ManageCollectionRequest;
use App\Http\Requests\Backend\Access\Collection\UpdateCollectionRequest;
use App\Http\Requests\Backend\Access\Collection\StoreCollectionRequest;
use App\Models\Access\Collection\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CollectionController extends Controller
{

    /**
     * @param ManageCollectionRequest $request
     *
     * @return mixed
     */
    public function index(ManageCollectionRequest $request)
    {
        return view('backend.access.collection.index');
    }

    /**
     * @param ManageCollectionRequest $request
     *
     * @return mixed
     */
    public function create(ManageCollectionRequest $request)
    {
        return view('backend.access.collection.create');
    }

    /**
     * @param Collection $collection
     * @param StoreCollectionRequest $request
     *
     * @return mixed
     */
    public function store(StoreCollectionRequest $request)
    {
        $input = Input::all();
        dd($input);
        die();
        $imageName = null;

        if (\request('file') != null) {
            $imageName = time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('img/backend/collection/'), $imageName);
        }

        event(new CollectionCreated(Collection::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName
        ])
        ));

        return redirect()->route('admin.access.collection.index')->withFlashSuccess(trans('alerts.backend.collection.created'));
    }

    /**
     * @param Collection $collection
     * @param ManageCollectionRequest $request
     *
     * @return mixed
     */
    public function edit(Collection $collection, ManageCollectionRequest $request)
    {
        return view('backend.access.collection.edit', [
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
        $imageName = $collection->image;
        if ($request->file != null) {
            if ($imageName == null) {
                $imageName = time() . '.' . $request->file->getClientOriginalExtension();
            }
            $request->file->move(public_path('img/backend/collection/'), $imageName);
        }

        $collection->title = $request->title;
        $collection->description = $request->description;
        $collection->image = $imageName;

        $collection->save();
        event(new CollectionUpdated($collection));

        return redirect()->route('admin.access.collection.index')->withFlashSuccess(trans('alerts.backend.collection.updated'));
    }

    /**
     * @param Collection $collection
     * @param ManageCollectionRequest $request
     *
     * @return mixed
     */
    public function destroy(Collection $collection, ManageCollectionRequest $request)
    {
        $fileName = public_path('img/backend/collection/') . $collection->image;
        if (file_exists($fileName) AND $collection->image != null) {
            unlink($fileName);
        }
        $collection->delete();
        event(new CollectionDeleted($collection));

        return redirect()->route('admin.access.collection.index')->withFlashSuccess(trans('alerts.backend.collection.deleted'));
    }
}

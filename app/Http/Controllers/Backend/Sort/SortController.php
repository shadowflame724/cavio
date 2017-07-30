<?php

namespace App\Http\Controllers\Backend\Sort;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Sort\ManageSortRequest;
use App\Http\Requests\Request;
use App\Models\Category\Category;
use App\Models\Collection\Collection;
use App\Models\CollectionZone\CollectionZone;
use App\Models\Product\Product;


class SortController extends Controller
{

    /**
     * @param ManageSortRequest $request
     *
     * @return mixed
     */
    public function index(ManageSortRequest $request)
    {
        $collectionZones = CollectionZone::all();

        return view('backend.sort.index',
            ['collectionZones' => $collectionZones]
        );

    }

    /**
     * @return mixed
     */
    public function collectionShow($id)
    {
        $collection = Collection::find($id);
        $product_ids = $collection->product_ids;

        $ids = explode(',', $product_ids);

        $json = [
            'type' => 'collection',
            'id' => 10,
            'products' => Product::whereIn('id', $ids)->orderByRaw(\DB::raw("FIELD(id, $product_ids)"))->get(),
            'product_ids' => $product_ids
        ];


        return response()->json($json);
    }

    /**
     * @return mixed
     */
    public function categoryShow($id)
    {
        $category = Category::find($id);
        $product_ids = $category->product_ids;
        $ids = explode(',', $product_ids);
        $json = [
            'type' => 'category',
            'id' => $id,
            'products' => Product::whereIn('id', $ids)->orderByRaw(\DB::raw("FIELD(id, $product_ids)"))->get(),
            'product_ids' => $product_ids
        ];

        return response()->json($json);
    }

    /**
     * @return mixed
     */
    public function collectionZoneShow($id)
    {
        $collectionZone = CollectionZone::find($id);
        $product_ids = $collectionZone->product_ids;
        $ids = explode(',', $product_ids);
        $json = [
            'type' => 'collectionZone',
            'id' => $id,
            'products' => Product::whereIn('id', $ids)->orderByRaw(\DB::raw("FIELD(id, $product_ids)"))->get(),
            'product_ids' => $product_ids
        ];

        return response()->json($json);
    }

    /**
     * @return mixed
     */
    public function update(\Illuminate\Http\Request $request)
    {
        switch ($request->type) {
            case 'collection':
                $collection = Collection::find($request->id);
                $collection->product_ids = $request->product_ids;
                $collection->save();

                break;
            case 'category':
                $category = Category::find($request->id);
                $category->product_ids = $request->product_ids;
                $category->save();

                break;
            case 'collectionZone':
                $collectionZone = CollectionZone::find($request->id);
                $collectionZone->product_ids = $request->product_ids;
                $collectionZone->save();

                break;
        }

        return redirect(route('admin.sort.index'))->withFlashSuccess(trans('alerts.backend.sort.updated'));;
    }

}

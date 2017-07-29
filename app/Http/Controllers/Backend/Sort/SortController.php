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
        $collection = Collection::find(1);
        $products = Product::whereIn('id', $collection->product_ids)->all();
        dd($products);
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
        $products = Product::whereIn('id', $collection->product_ids)->all();
        dd($products);

        return response()->json($products);
    }

    /**
     * @return mixed
     */
    public function categoryShow($id)
    {
        $category = Category::find($id);
        //dd($category);
        //$products = $category->goods()->get();

        return response()->json($category->product_ids);
    }

    /**
     * @return mixed
     */
    public function collectionZoneShow($id)
    {
        $collectionZone = CollectionZone::find($id);
        //dd($collectionZone);
        //$products = $collectionZone->goods()->get();

        return response()->json($collectionZone->product_ids);
    }

}

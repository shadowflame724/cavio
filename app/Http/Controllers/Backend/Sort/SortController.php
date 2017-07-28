<?php

namespace App\Http\Controllers\Backend\Sort;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Sort\ManageSortRequest;
use App\Http\Requests\Request;
use App\Models\Category\Category;
use App\Models\Collection\Collection;
use App\Models\CollectionZone\CollectionZone;


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
        //dd($collection);
        //$products = $collection->goods()->get();

        return response()->json($collection->product_ids);
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

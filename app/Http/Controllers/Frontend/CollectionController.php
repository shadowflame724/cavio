<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Collection\Collection;
use App\Models\CollectionZone\CollectionZone;
use App\Models\Product\Product;
use App\Models\Zone\Zone;
use App\Repositories\Frontend\Product\ProductRepository;

class CollectionController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $page = $this->page('collections');

        return view('frontend.pages.collections.index', [
            'page' => $page,
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $collection = Collection::where('slug', $slug)->first();
        $page = $this->page('collections');
        return view('frontend.pages.collections.show', [
            'page' => $page,
            'collection' => $collection,
        ]);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function showPopup($collSlug, $zoneSlug, ProductRepository $productRep)
    {
        $collection = Collection::where('slug', $collSlug)
            ->firstOrFail();
        $collectionZoneAll = CollectionZone::where('collection_id', $collection->id)
            ->orderBy('id','DESC')
            ->get();
        $collectionZoneCur = CollectionZone::where('slug', $zoneSlug)
            ->where('collection_id', $collection->id)
            ->firstOrFail();
        $products = [];
        if(!empty($collectionZoneCur->product_ids)) {
            $prodIds = explode(',', $collectionZoneCur->product_ids);
            $products = $productRep->whereInIds($prodIds);
        }
//        dd($products);
        $page = $this->page('collections');

        return view('frontend.pages.collections.popup', [
            'page' => $page,
            'collection' => $collection,
            'zone' => $collectionZoneCur,
            'collectionZones' => $collectionZoneAll,
            'products' => $products,
        ]);
    }
}
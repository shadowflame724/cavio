<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Zone\Zone;
use App\Models\Product\Product;
use App\Models\Collection\Collection;
use App\Models\CollectionZone\CollectionZone;
use App\Repositories\Frontend\Product\ProductRepository;

class ZoneController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $page = $this->page('zones');

        return view('frontend.pages.zones.index', [
            'page' => $page,
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $page = $this->page('zones');
        $zone = Zone::where('slug', $slug)->firstOrFail();


        return view('frontend.pages.zones.show', [
            'page' => $page,
            'zone' => $zone,
        ]);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function showPopup($zoneSlug, $collSlug, ProductRepository $productRep)
    {
//        $coll = CollectionZone::where('slug', $collSlug)->firstOrFail();

        $zone = Zone::where('slug', $zoneSlug)->firstOrFail();
        $coll = Collection::where('slug', $collSlug)->firstOrFail();
        $collectionZoneAll = CollectionZone::where('zone_id', $zone->id)
            ->orderBy('id','DESC')
            ->get();
        $collectionZoneCur = CollectionZone::where('zone_id', $zone->id)
            ->where('collection_id', $coll->id)
            ->get();
        $collIds = [];
        foreach ($collectionZoneAll as $item) {
            $collIds[$item->collection_id] = $item->collection_id;
        }
        $collectionAll = Collection::whereIn('id', $collIds)
            ->get();
        $products = [];
        foreach ($collectionZoneCur as $item) {
            if(!empty($item->product_ids)) {
                $prodIds = explode(',', $item->product_ids);
                $products += $productRep->whereInIds($prodIds);
            }
        }

        $page = $this->page('zones');

//        dd([
//            'page' => $page,
//            'zone' => $zone,
//            'collection' => $coll,
//            'collectionAll' => $collectionAll,
//            'collectionZone' => $collectionZoneCur,
//            'collectionZoneAll' => $collectionZoneAll,
//            'products' => $products,
//        ]);

        return view('frontend.pages.zones.popup', [
            'page' => $page,
            'zone' => $zone,
            'collection' => $coll,
            'collectionAll' => $collectionAll,
            'collectionZone' => $collectionZoneCur,
            'collectionZoneAll' => $collectionZoneAll,
            'products' => $products
        ]);
    }
}
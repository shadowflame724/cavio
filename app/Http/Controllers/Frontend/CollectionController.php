<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Collection\Collection;
use App\Models\CollectionZone\CollectionZone;
use App\Models\Zone\Zone;

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
    public function showPopup($collection, $zone)
    {
        $collection = Collection::where('slug', $collection)->first();
        $zone = CollectionZone::where('slug', $zone)->first();
        $page = $this->page('collections');

        return view('frontend.pages.collections.show', [
            'page' => $page,
            'collection' => $collection,
        ]);
    }
}
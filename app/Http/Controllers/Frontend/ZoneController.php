<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Zone\Zone;
use App\Models\CollectionZone\CollectionZone;

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
        $zone = Zone::where('slug', $slug)->first();


        return view('frontend.pages.zones.show', [
            'page' => $page,
            'zone' => $zone,
        ]);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function showPopup($zone, $collection)
    {
        $zone = Zone::where('slug', $zone)->first();
        $collection = CollectionZone::where('slug', $zone)->first();
        $page = $this->page('zones');


        return view('frontend.pages.zones.show', [
            'page' => $page,
            'zone' => $zone,
        ]);
    }
}
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Zone\Zone;

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
     * @param Zone $zone
     * @return \Illuminate\View\View
     */
    public function show(Zone $zone)
    {
        $page = $this->page('zones');

        return view('frontend.pages.zones.show', [
            'page' => $page,
            'zone' => $zone,
        ]);
    }
}
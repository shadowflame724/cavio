<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Collection\Collection;
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
     * @param Collection $collection
     * @return \Illuminate\View\View
     */
    public function show(Collection $collection)
    {
        $page = $this->page('collections');

        return view('frontend.pages.collections.show', [
            'page' => $page,
            'collection' => $collection,
        ]);
    }
}
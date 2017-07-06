<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Good\Good;

class GoodsController extends Controller
{
    /**
     * @param Good $good
     * @return \Illuminate\View\View
     */
    public function show(Good $good)
    {
        $page = $this->page('product-card');

        return view('frontend.pages.product-card', [
            'page' => $page,
            'good' => $good,
        ]);
    }
}
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Collection\Collection;
use App\Models\FAQ\FAQ;
use App\Models\FinishTissue\FinishTissue;
use App\Models\News\News;
use App\Models\Page\Page;
use App\Models\Popup\Popup;
use App\Models\Showroom\Showroom;
use App\Models\Zone\Zone;
use App\Repositories\Frontend\Product\ProductRepository;

/**
 * Class FrontendController.
 */
class ProductController extends Controller
{
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $page = $this->page('catalogue');
        $model = $this->product->getAll();
//        dd($model);

        return view('frontend.pages.catalogue', [
            'model' => $model,
            'page' => $page,
        ]);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function catOne($slug)
    {
        $page = $this->page('catalogue');
        $model = $this->product->catOne($slug);

        return view('frontend.pages.catalogue', [
            'page' => $page,
            'model' => $model
        ]);
    }

    public function one($slug)
    {
        $model = $this->product->getBySlug($slug);
        return view('frontend.pages.product-card', [
            'product' => $model,
        ]);
    }
}

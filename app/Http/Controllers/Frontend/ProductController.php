<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collection\Collection;
use App\Models\FAQ\FAQ;
use App\Models\FinishTissue\FinishTissue;
use App\Models\News\News;
use App\Models\Page\Page;
use App\Models\Popup\Popup;
use App\Models\Showroom\Showroom;
use App\Models\Zone\Zone;
use App\Models\Category\Category;
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
    public function index(Request $request)
    {
        return $this->showOneCategView('', [], $request);

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
    public function catOne($slug, Request $request)
    {
        return $this->showOneCategView($slug, [], $request);
    }
    /**
     * @return \Illuminate\View\View
     */
    public function showOneCategView($slug = '', $data = [], $request)
    {
        $colls = (!empty($request->input('collections'))) ? explode(',', $request->input('collections')) : null;
        $zones = (!empty($request->input('zones'))) ? explode(',', $request->input('zones')) : null;
        $sale = ($request->input('sale') == 'true') ? true : false;
//        dd($sale);
        $catsMenu = [];
        $categories = Category::all();
        $productCatsIds = [];
        foreach ($categories as $category) {
            if($category->parent_id == null){
                $isPrntActive = false;
                if($category->slug === $slug){
                    $isPrntActive = true;
                }
                $catsMenu[$category->id] = [
                    'parent' => [
                        'slug' => $category->slug,
                        'name' => $category->name,
                        'name_ru' => $category->name_ru,
                        'name_it' => $category->name_it,
                        'active' => false,
                    ],
                    'childs' => [],
                ];
                foreach ($category->children as $child) {
                    if($category->slug === $slug){ // накапливаем продукты из дочерних категорий если находимся в родительской
                        $productCatsIds[] = $child->id;
                    }
                    $isChldActive = false;
                    if($child->slug === $slug){
                        $isPrntActive = true;
                        $isChldActive = true;
                        $productCatsIds[] = $child->id;
                    }
                    $catsMenu[$category->id]['childs'][$child->id] = [
                        'slug' => $child->slug,
                        'name' => $child->name,
                        'name_ru' => $child->name_ru,
                        'name_it' => $child->name_it,
                        'active' => $isChldActive,
                    ];
                }
                $catsMenu[$category->id]['parent']['active'] = $isPrntActive;
            }
        }
//        echo'<pre>';
//        print_r($catsMenu);
//        echo'</pre>';
//        dd($productCatsIds);

        $page = $this->page('catalogue');
        if (!empty($slug)) {
            $products = $this->product->catOne($slug, 1);
        } else {
            $products = $this->product->getAll('id','desc',1);
        }
        return view('frontend.pages.catalogue', [
            'page' => $page,
            'cats' => $catsMenu,
            'model' => $products
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

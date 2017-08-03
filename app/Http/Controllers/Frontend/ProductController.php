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
        return $this->showOneCategView('', $request);

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
        return $this->showOneCategView($slug, $request);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function showOneCategView($slug = '', $request)
    {
        $data = [
            'sale' => false,
            'zones' => null,
            'colls' => null,
            'page' => null,
            'getParams' => '',
        ];
        $notEmptyGet = false;
        if ($request->input('sale') == 'true') {
            $data['sale'] = true;
            $notEmptyGet = true;
        }
        if (!empty($request->input('zones'))) {
            $data['zones'] = explode(',', $request->input('zones'));
            $notEmptyGet = true;
        }
        if (!empty($request->input('collections'))) {
            $data['colls'] = explode(',', $request->input('collections'));
            $notEmptyGet = true;
        }
        if ((int)$request->input('page') > 0) {
            $data['page'] = (int)$request->input('page');
            $notEmptyGet = true;
        }
        if ($notEmptyGet) {
            $data['getParams'] = '?sale=' . $request->input('sale') .
                '&zones=' . $request->input('zones') .
                '&colls=' . $request->input('collections') .
                '&page=' . $request->input('page');
        }
        $catsMenu = [];
        $categories = Category::all();
        $productCatsIds = [];
        foreach ($categories as $category) {
            if ($category->parent_id == null) {
                $isPrntActive = false;
                if ($category->slug === $slug) {
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
                    if ($category->slug === $slug) { // накапливаем продукты из дочерних категорий если находимся в родительской
                        $productCatsIds[] = $child->id;
                    }
                    $isChldActive = false;
                    if ($child->slug === $slug) {
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

//        dd($data);
        $page = $this->page('catalogue');
        if (!empty($slug)) {
            $products = $this->product->catOne($slug, 'id', 'desc', 1, $data);
        } else {
            $products = $this->product->getAll('id', 'desc', 1, $data);
        }
        return view('frontend.pages.catalogue', [
            'page' => $page,
            'cats' => $catsMenu,
            'model' => $products,
            'getData' => $data,
            'getParams' => $data['getParams']
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

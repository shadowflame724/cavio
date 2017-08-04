<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Collection\Collection;
use App\Models\Document\Document;
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
class FrontendController extends Controller
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
        $page = $this->page('index');
        $popup = Popup::find(1);
        $collectionsArr = Collection::all();

        foreach ($collectionsArr as $key => $collection){
            $collectionsArr[$key]['products'] = $this->product->whereInIds($collection->getProductsByIds());
        }

        return view('frontend.index', [
            'page' => $page,
            'collectionsArr' => $collectionsArr,
            'popup' => $popup
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function about()
    {
        $page = $this->page('about');

        return view('frontend.pages.about', [
            'page' => $page
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function staticPage($slug)
    {
        $page = $this->page($slug);

        return view('frontend.pages.static', [
            'page' => $page
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function privacyPolicy()
    {
        $page = $this->page('privacy-policy');

        return view('frontend.pages.privacy-policy', [
            'page' => $page
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function stash()
    {
        $page = $this->page('stash');
        //$products =;

        return view('frontend.pages.stash', [
            'page' => $page
        ]);
    }



    /**
     * @return \Illuminate\View\View
     */
    public function faq()
    {
        $faqs = FAQ::all();
        $page = $this->page('faq');

        return view('frontend.pages.faq', [
            'faqs' => $faqs,
            'page' => $page
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function showrooms()
    {
        $showrooms = Showroom::all();
        $page = $this->page('showrooms');
        $coordinates = [];
        foreach ($showrooms as $showroom) {
            $coordinates[] = [
                'lat' => $showroom->lat,
                'lng' => $showroom->lng,
            ];
        }
        $countries = ($showrooms->groupBy('country'));
        $showrooms = $showrooms->groupBy('country');

        return view('frontend.pages.showrooms', [
            'showrooms' => $showrooms,
            'page' => $page,
            'coordinates' => json_encode($coordinates),
            'countries' => $countries
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function contacts()
    {
        $page = $this->page('contacts');

        return view('frontend.pages.contacts', [
            'page' => $page
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function finishTissue()
    {
        $page = $this->page('finish-tissue');
        $finishTissues = FinishTissue::all();

        return view('frontend.pages.finish-tissue', [
            'page' => $page,
            'finishTissues' => $finishTissues
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function pressDesign()
    {

        if(! access()->user() || ! access()->user()->hasRole(4)) {
            return redirect('/');
        }
        $page = $this->page('press-design');
        $documents = Document::all();

        return view('frontend.pages.press-design', [
            'page' => $page,
            'documents' => $documents
        ]);
    }

}

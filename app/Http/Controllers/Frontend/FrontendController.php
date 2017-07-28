<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Collection\Collection;
use App\Models\FAQ\FAQ;
use App\Models\FinishTissue\FinishTissue;
use App\Models\News\News;
use App\Models\Page\Page;
use App\Models\Popup\Popup;
use App\Models\Showroom\Showroom;
use App\Models\Zone\Zone;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $page = $this->page('index');
        $popup = Popup::find(1);

        return view('frontend.index', [
            'page' => $page,
            'popup' => $popup
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
    public function news()
    {
        $news = News::all();
        $page = $this->page('news');

        return view('frontend.pages.news', [
            'news' => $news,
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

}

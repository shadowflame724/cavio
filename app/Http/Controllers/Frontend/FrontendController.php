<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Collection\Collection;
use App\Models\FAQ\FAQ;
use App\Models\News\News;
use App\Models\Page\Page;
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

        return view('frontend.index', [
            'page' => $page,
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
    public function catalogue()
    {
        $page = $this->page('catalogue');

        return view('frontend.pages.catalogue', [
            'page' => $page,
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
        $page = $this->page('showrooms');

        return view('frontend.pages.showrooms', [
            'page' => $page
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
    public function collections()
    {
        $page = $this->page('collections');

        return view('frontend.pages.zones_collections', [
            'page' => $page,
        ]);
    }


    public function page($pageKey)
    {
        $page = Page::where('slug', $pageKey)->get();

        return $page[0];
    }
}

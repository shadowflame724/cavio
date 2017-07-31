<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News\News;

use App\Repositories\Frontend\Product\ProductRepository;

class NewsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $news = News::all();
        $page = $this->page('news');

        return view('frontend.pages.news.index', [
            'news' => $news,
            'page' => $page
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $news = News::where('slug', $slug)->first();
        $page = $this->page('news');

        return view('frontend.pages.news.show', [
            'page' => $page,
            'news' => $news,
        ]);
    }
}
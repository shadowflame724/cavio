<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use Illuminate\Http\Request;
use App\Repositories\Frontend\Product\ProductRepository;

class NewsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $config = config('app.settings');
        $news = News::all();
        $page = $this->page('news');

        if (!empty($config['news_types_data']) && !empty($news)) {
            $news_types_data = [];
            foreach ($news as $newsOne) {
                $news_types_data[$newsOne['type']] = $config['news_types_data'][$newsOne['type']];
            }
            ksort($news_types_data);
        }

        return view('frontend.pages.news.index', [
            'news' => $news,
            'page' => $page,
            'news_types_data' => $news_types_data
        ]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function filter($id)
    {
        $config = config('app.settings');
        $news = News::all();
        $page = $this->page('news');

        if (!empty($config['news_types_data']) && !empty($news)) {
            $news_types_data = [];
            foreach ($news as $newsOne) {
                $news_types_data[$newsOne['type']] = $config['news_types_data'][$newsOne['type']];
            }
            ksort($news_types_data);
        }

        return view('frontend.pages.news.index', [
            'news' => $news,
            'page' => $page,
            'news_types_data' => $news_types_data
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
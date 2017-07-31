<?php

namespace App\Http\Controllers\Backend\News;

use App\Http\Requests\Backend\News\ManageNewsRequest;
use App\Http\Requests\Backend\News\UpdateNewsRequest;
use App\Http\Requests\Backend\News\StoreNewsRequest;
use App\Models\News\News;
use App\Http\Controllers\Controller;
use App\Models\Settings\Settings;
use App\Repositories\Backend\News\NewsRepository;



class NewsController extends Controller
{

    /**
     * @var NewsRepository
     */
    protected $news;

    /**
     * @param NewsRepository $news
     */
    public function __construct(NewsRepository $news)
    {
        $this->news = $news;
    }

    /**
     * @param ManageNewsRequest $request
     *
     * @return mixed
     */
    public function index(ManageNewsRequest $request)
    {
        return view('backend.news.index');
    }

    /**
     * @param ManageNewsRequest $request
     *
     * @return mixed
     */
    public function create(ManageNewsRequest $request)
    {
        $newsTypes = Settings::find(1)->getAttributeValue('news_types_data');

        return view('backend.news.create',[
            'newsTypes' => json_decode($newsTypes)
        ]);
    }

    /**
     * @param News $news
     * @param StoreNewsRequest $request
     *
     * @return mixed
     */
    public function store(StoreNewsRequest $request)
    {
        $this->news->create($request->all());

        $this->moveImg($request->photo);

        return redirect()->route('admin.news.index')->withFlashSuccess(trans('alerts.backend.news.created'));
    }

    /**
     * @param News $news
     * @param ManageNewsRequest $request
     *
     * @return mixed
     */
    public function edit(News $news, ManageNewsRequest $request)
    {
        return view('backend.news.edit', [
            'news' => $news,
        ]);
    }

    /**
     * @param News $news
     * @param UpdateNewsRequest $request
     *
     * @return mixed
     */
    public function update(News $news, UpdateNewsRequest $request)
    {
        $oldName = $news->image;

        $this->news->update($news, $request->all());
        $this->moveImg($request->photo, $oldName);

        return redirect()->route('admin.news.index')->withFlashSuccess(trans('alerts.backend.news.updated'));
    }

    /**
     * @param News $news
     * @param ManageNewsRequest $request
     *
     * @return mixed
     */
    public function destroy(News $news, ManageNewsRequest $request)
    {
        $imgName = $news->image;
        $this->news->delete($news);
        $this->deleteImg($imgName);

        return redirect()->route('admin.news.index')->withFlashSuccess(trans('alerts.backend.news.deleted'));
    }
}

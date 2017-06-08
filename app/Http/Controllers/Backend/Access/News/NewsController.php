<?php

namespace App\Http\Controllers\Backend\Access\News;

use App\Events\Backend\Access\News\NewsCreated;
use App\Events\Backend\Access\News\NewsDeleted;
use App\Events\Backend\Access\News\NewsUpdated;
use App\Http\Requests\Backend\Access\News\ManageNewsRequest;
use App\Http\Requests\Backend\Access\News\UpdateNewsRequest;
use App\Http\Requests\Backend\Access\News\StoreNewsRequest;
use App\Models\Access\News\News;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use EMTypograph;

require_once('EMT.php');


class NewsController extends Controller
{

    /**
     * @param ManageNewsRequest $request
     *
     * @return mixed
     */
    public function index(ManageNewsRequest $request)
    {
        return view('backend.access.news.index');
    }

    /**
     * @param ManageNewsRequest $request
     *
     * @return mixed
     */
    public function create(ManageNewsRequest $request)
    {
        return view('backend.access.news.create');
    }

    /**
     * @param News $news
     * @param StoreNewsRequest $request
     *
     * @return mixed
     */
    public function store(StoreNewsRequest $request)
    {

        $body = EMTypograph::fast_apply($request->body);
        $preview = EMTypograph::fast_apply($request->preview);

        $bodyCleaned = clean($body);
        $previewCleaned = clean($preview);

        $input = Input::all();
        dd($input);
        die();
        $imageName = null;

        if (\request('file') != null) {
            $imageName = time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path('img/backend/news/'), $imageName);
        }

        event(new NewsCreated(News::create([
            'title' => $request->title,
            'description' => $request->description,
            'preview' => $previewCleaned,
            'body' => $bodyCleaned,
            'image' => $imageName,
        ])
        ));

        return redirect()->route('admin.access.news.index')->withFlashSuccess(trans('alerts.backend.news.created'));
    }

    /**
     * @param News $news
     * @param ManageNewsRequest $request
     *
     * @return mixed
     */
    public function edit(News $news, ManageNewsRequest $request)
    {
        return view('backend.access.news.edit', [
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
        $body = EMTypograph::fast_apply($request->body);
        $preview = EMTypograph::fast_apply($request->preview);

        $bodyCleaned = clean($body);
        $previewCleaned = clean($preview);

        $imageName = $news->image;
        if ($request->file != null) {
            if ($imageName == null) {
                $imageName = time() . '.' . $request->file->getClientOriginalExtension();
            }
            $request->file->move(public_path('img/backend/news/'), $imageName);
        }

        $news->title = $request->title;
        $news->description = $request->description;
        $news->preview = $previewCleaned;
        $news->body = $bodyCleaned;
        $news->image = $imageName;

        $news->save();
        event(new NewsUpdated($news));

        return redirect()->route('admin.access.news.index')->withFlashSuccess(trans('alerts.backend.news.updated'));
    }

    /**
     * @param News $news
     * @param ManageNewsRequest $request
     *
     * @return mixed
     */
    public function destroy(News $news, ManageNewsRequest $request)
    {
        $fileName = public_path('img/backend/news/') . $news->image;
        if (file_exists($fileName) AND $news->image != null) {
            unlink($fileName);
        }
        $news->delete();
        event(new NewsDeleted($news));

        return redirect()->route('admin.access.news.index')->withFlashSuccess(trans('alerts.backend.news.deleted'));
    }
}

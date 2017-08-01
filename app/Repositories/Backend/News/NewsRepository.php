<?php

namespace App\Repositories\Backend\News;

use App\Models\News\News;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\News\NewsCreated;
use App\Events\Backend\News\NewsDeleted;
use App\Events\Backend\News\NewsUpdated;

/**
 * Class NewsRepository.
 */
class NewsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = News::class;

    /**
     * @param string $order_by
     * @param string $sort
     *
     * @return mixed
     */
    public function getAll($order_by = 'sort', $sort = 'asc')
    {
        return $this->query()
            ->orderBy($order_by, $sort)
            ->get();
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('news_table') . '.id',
                config('news_table') . '.name',
                config('news_table') . '.type',
                config('news_table') . '.image',
                config('news_table') . '.created_at',
            ]);
    }


    /**
     * @param array $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function create(array $input)
    {
        DB::transaction(function () use ($input) {
            $news = self::MODEL;
            $news = new $news();
            $news->type = $input['type'];
            $news->title = $input['title'];
            $news->title_ru = $input['title_ru'];
            $news->title_it = $input['title_it'];
            $news->name = $input['name'];
            $news->name_ru = $input['name_ru'];
            $news->name_it = $input['name_it'];
            $news->description = $input['description'];
            $news->description_ru = $input['description_ru'];
            $news->description_it = $input['description_it'];
            $news->preview = clean($input['preview']);
            $news->preview_ru = clean($input['preview_ru']);
            $news->preview_it = clean($input['preview_it']);
            $news->body = clean($input['body']);
            $news->body_ru = clean($input['body_ru']);
            $news->body_it = clean($input['body_it']);
            $news->image = $input['photo'];

            if ($news->save()) {
                event(new NewsCreated($news, $input['admin_comment']));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.news.create_error'));
        });
    }

    /**
     * @param Model $news
     * @param  $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update(Model $news, array $input)
    {
        $news->type = $input['type'];
        $news->title = $input['title'];
        $news->title_ru = $input['title_ru'];
        $news->title_it = $input['title_it'];
        $news->name = $input['name'];
        $news->name_ru = $input['name_ru'];
        $news->name_it = $input['name_it'];
        $news->description = $input['description'];
        $news->description_ru = $input['description_ru'];
        $news->description_it = $input['description_it'];
        $news->preview = clean($input['preview']);
        $news->preview_ru = clean($input['preview_ru']);
        $news->preview_it = clean($input['preview_it']);
        $news->body = clean($input['body']);
        $news->body_ru = clean($input['body_ru']);
        $news->body_it = clean($input['body_it']);
        $news->image = $input['photo'];

        DB::transaction(function () use ($news, $input) {
            if ($news->save()) {
                event(new NewsUpdated($news, $input['admin_comment']));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.news.update_error'));
        });
    }

    /**
     * @param Model $news
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $news)
    {
        DB::transaction(function () use ($news) {
            if ($news->delete()) {
                event(new NewsDeleted($news));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.news.delete_error'));
        });
    }
}

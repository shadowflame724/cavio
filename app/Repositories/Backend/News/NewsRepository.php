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
                config('news_table') . '.title',
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
            $news->description = $input['description'];
            $news->preview = clean($input['preview']);
            $news->body = clean($input['body']);
            $news->image = $input['image'];

            if ($news->save()) {
                event(new NewsCreated($news));

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
        $news->description = $input['description'];
        $news->preview = clean($input['preview']);
        $news->body = clean($input['body']);
        $news->type = $input['type'];
        $news->image = $input['image'];

        DB::transaction(function () use ($news, $input) {
            if ($news->save()) {
                event(new NewsUpdated($news));

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

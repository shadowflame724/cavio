<?php

namespace App\Repositories\Backend\Access\News;

use App\Models\Access\News\News;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Access\News\NewsCreated;
use App\Events\Backend\Access\News\NewsDeleted;
use App\Events\Backend\Access\News\NewsUpdated;

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
                config('access.news_table') . '.id',
                config('access.news_table') . '.title',
                config('access.news_table') . '.image',
                config('access.news_table') . '.created_at',
            ]);
    }
}

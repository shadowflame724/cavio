<?php

namespace App\Repositories\Backend\Access\Collection;

use App\Models\Access\Collection\Collection;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Access\Collection\CollectionCreated;
use App\Events\Backend\Access\Collection\CollectionDeleted;
use App\Events\Backend\Access\Collection\CollectionUpdated;

/**
 * Class CollectionRepository.
 */
class CollectionRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Collection::class;

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
                config('access.Collection_table') . '.id',
                config('access.Collection_table') . '.title',
                config('access.Collection_table') . '.image',
                config('access.Collection_table') . '.created_at',
            ]);
    }
}

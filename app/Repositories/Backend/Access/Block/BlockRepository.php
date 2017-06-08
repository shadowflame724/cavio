<?php

namespace App\Repositories\Backend\Access\Block;

use App\Models\Access\Block\Block;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Access\Block\BlockCreated;
use App\Events\Backend\Access\Block\BlockDeleted;
use App\Events\Backend\Access\Block\BlockUpdated;

/**
 * Class BlockRepository.
 */
class BlockRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Block::class;

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
                config('access.pages_table') . '.id',
                config('access.pages_table') . '.title',
                config('access.pages_table') . '.body',
                config('access.pages_table') . '.image',
            ]);
    }
}

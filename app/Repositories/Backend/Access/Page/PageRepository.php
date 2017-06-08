<?php

namespace App\Repositories\Backend\Access\Page;

use App\Models\Access\Page\Page;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Access\Page\PageCreated;
use App\Events\Backend\Access\Page\PageDeleted;
use App\Events\Backend\Access\Page\PageUpdated;

/**
 * Class PageRepository.
 */
class PageRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Page::class;

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
                config('access.pages_table') . '.pageKey',
                config('access.pages_table') . '.title',
                config('access.pages_table') . '.description',
                config('access.pages_table') . '.image',
            ]);
    }
}

<?php

namespace App\Repositories\Backend\Good;

use App\Models\Good\Good;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Good\GoodCreated;
use App\Events\Backend\Good\GoodDeleted;
use App\Events\Backend\Good\GoodUpdated;

/**
 * Class GoodRepository.
 */
class GoodRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Good::class;

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
                config('good_table') . '.id',
                config('good_table') . '.name',
                config('good_table') . '.created_at',
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
            $good = self::MODEL;
            $good = new $good();
            $good->category_id = $input['category_id'];
            $good->collection_id = $input['collection_id'];
            $good->zone_id = $input['zone_id'];

            $good->code = $input['code'];
            $good->name = $input['name'];

            $good->dimensions = $input['dimensions'];
            $good->tissue = $input['tissue'];
            $good->finish = $input['finish'];
            $good->description = $input['description'];

            if ($good->save()) {
                event(new GoodCreated($good));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.good.create_error'));
        });
    }

    /**
     * @param Model $good
     * @param  $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update(Model $good, array $input)
    {
        $good->category_id = $input['category_id'];
        $good->collection_id = $input['collection_id'];
        $good->zone_id = $input['zone_id'];

        $good->code = $input['code'];
        $good->name = $input['name'];

        $good->dimensions = $input['dimensions'];
        $good->tissue = $input['tissue'];
        $good->finish = $input['finish'];
        $good->description = $input['description'];

        DB::transaction(function () use ($good, $input) {
            if ($good->save()) {
                event(new GoodUpdated($good));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.good.update_error'));
        });
    }

    /**
     * @param Model $good
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $good)
    {
        DB::transaction(function () use ($good) {
            if ($good->delete()) {
                event(new GoodDeleted($good));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.good.delete_error'));
        });
    }
}

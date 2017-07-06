<?php

namespace App\Repositories\Backend\Good;

use App\Models\Dimensions\Dimensions;
use App\Models\Good\Good;
use App\Models\GoodsPhotos\GoodsPhotos;
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
            $good->save();

            foreach ($input['collectionZone_id'] as $collectionZone) {
                $good->collectionZone()->attach($collectionZone);
            }

            foreach ($input['dimensions'] as $dimension) {
                Dimensions::create([
                    'good_id' => $good->id,
                    'length' => $dimension['length'],
                    'width' => $dimension['width'],
                    'height' => $dimension['height'],
                    'mattress' => $dimension['mattress'],
                    'weight' => $dimension['weight']
                ]);
            }

            foreach ($input['finishTissues_id'] as $finishTissue) {
                $good->finishTissues()->attach($finishTissue);
            }

            foreach ($input['images'] as $photo) {
                GoodsPhotos::create([
                    'good_id' => $good->id,
                    'image' => $photo,
                    'type' => 0
                ]);
            }

            $good->category_id = $input['category_id'];
            $good->code = $input['code'];
            $good->price = $input['price'];
            $good->name = $input['name'];
            $good->name_ru = $input['name_ru'];
            $good->name_it = $input['name_it'];
            $good->description = $input['description'];
            $good->description_ru = $input['description_ru'];
            $good->description_it = $input['description_it'];

            if ($good->save()) {
                event(new GoodCreated($good));

                return true;
            }

            $good->delete();

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
        $good->collectionZone()->detach();
        foreach ($input['collectionZone_id'] as $collectionZone) {
            $good->collectionZone()->attach($collectionZone);
        }

        Dimensions::where('good_id', $good->id)->delete();
        foreach ($input['dimensions'] as $dimension) {
            Dimensions::create([
                'good_id' => $good->id,
                'length' => $dimension['length'],
                'width' => $dimension['width'],
                'height' => $dimension['height'],
                'mattress' => $dimension['mattress'],
                'weight' => $dimension['weight']
            ]);
        }

        $good->finishTissues()->detach();
        foreach ($input['finishTissues_id'] as $finishTissue) {
            $good->finishTissues()->attach($finishTissue);
        }

        GoodsPhotos::where('good_id', $good->id)->delete();
        foreach ($input['images'] as $photo) {
            GoodsPhotos::create([
                'good_id' => $good->id,
                'image' => $photo,
                'type' => 0
            ]);
        }

        $good->category_id = $input['category_id'];
        $good->code = $input['code'];
        $good->price = $input['price'];
        $good->name = $input['name'];
        $good->name_ru = $input['name_ru'];
        $good->name_it = $input['name_it'];
        $good->description = $input['description'];
        $good->description_ru = $input['description_ru'];
        $good->description_it = $input['description_it'];

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

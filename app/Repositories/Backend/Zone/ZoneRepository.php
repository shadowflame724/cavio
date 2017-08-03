<?php

namespace App\Repositories\Backend\Zone;

use App\Models\Zone\Zone;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Zone\ZoneCreated;
use App\Events\Backend\Zone\ZoneDeleted;
use App\Events\Backend\Zone\ZoneUpdated;
use App\Http\Controllers\Controller;

/**
 * Class ZoneRepository.
 */
class ZoneRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Zone::class;

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
                config('zones_table') . '.id',
                config('zones_table') . '.title',
                config('zones_table') . '.sort',
                config('zones_table') . '.created_at',
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
            $zone = self::MODEL;
            $zone = new $zone();
            $zone->title = $input['title'];
            $zone->title_ru = $input['title_ru'];
            $zone->title_it = $input['title_it'];
            $zone->name = $input['name'];
            $zone->name_ru = $input['name_ru'];
            $zone->name_it = $input['name_it'];
            $zone->description = $input['description'];
            $zone->description_ru = $input['description_ru'];
            $zone->description_it = $input['description_it'];
            $zone->sort = $input['sort'];

            if ($zone->save()) {

                event(new ZoneCreated($zone));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.zone.create_error'));
        });
    }

    /**
     * @param Model $zone
     * @param  $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update(Model $zone, array $input)
    {
        $zone->title = $input['title'];
        $zone->title_ru = $input['title_ru'];
        $zone->title_it = $input['title_it'];
        $zone->name = $input['name'];
        $zone->name_ru = $input['name_ru'];
        $zone->name_it = $input['name_it'];
        $zone->description = $input['description'];
        $zone->description_ru = $input['description_ru'];
        $zone->description_it = $input['description_it'];
        $zone->sort = $input['sort'];

        DB::transaction(function () use ($zone, $input) {
            if ($zone->save()) {

                event(new ZoneUpdated($zone));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.zone.update_error'));
        });
    }

    /**
     * @param Model $zone
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $zone)
    {
        DB::transaction(function () use ($zone) {

            if ($zone->delete()) {

                event(new ZoneDeleted($zone));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.zone.delete_error'));
        });
    }
}

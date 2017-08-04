<?php

namespace App\Repositories\Backend\Showroom;

use App\Models\Showroom\Showroom;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Showroom\ShowroomCreated;
use App\Events\Backend\Showroom\ShowroomDeleted;
use App\Events\Backend\Showroom\ShowroomUpdated;

/**
 * Class ShowroomRepository.
 */
class ShowroomRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Showroom::class;

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
                config('showroom_table') . '.id',
                config('showroom_table') . '.country',
                config('showroom_table') . '.city',
                config('showroom_table') . '.name',
                config('showroom_table') . '.country_ru',
                config('showroom_table') . '.city_ru',
                config('showroom_table') . '.name_ru',
                config('showroom_table') . '.country_it',
                config('showroom_table') . '.city_it',
                config('showroom_table') . '.name_it'
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
            $showroom = self::MODEL;
            $showroom = new $showroom();
            $showroom->country = $input['country'];
            $showroom->country_ru = $input['country_ru'];
            $showroom->country_it = $input['country_it'];
            $showroom->city = $input['city'];
            $showroom->city_ru = $input['city_ru'];
            $showroom->city_it = $input['city_it'];
            $showroom->name = $input['name'];
            $showroom->name_ru = $input['name_ru'];
            $showroom->name_it = $input['name_it'];
            $showroom->address = $input['address'];
            $showroom->address_ru = $input['address_ru'];
            $showroom->address_it = $input['address_it'];
            $showroom->phone = $input['phone'];
            $showroom->phone2 = $input['phone2'];
            $showroom->fax = $input['fax'];
            $showroom->email = $input['email'];
            $showroom->lat = $input['lat'];
            $showroom->lng = $input['lng'];

            if ($showroom->save()) {
                event(new ShowroomCreated($showroom));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.showroom.create_error'));
        });
    }

    /**
     * @param Model $showroom
     * @param  $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update(Model $showroom, array $input)
    {
        $showroom->country = $input['country'];
        $showroom->country_ru = $input['country_ru'];
        $showroom->country_it = $input['country_it'];
        $showroom->city = $input['city'];
        $showroom->city_ru = $input['city_ru'];
        $showroom->city_it = $input['city_it'];
        $showroom->name = $input['name'];
        $showroom->name_ru = $input['name_ru'];
        $showroom->name_it = $input['name_it'];
        $showroom->address = $input['address'];
        $showroom->address_ru = $input['address_ru'];
        $showroom->address_it = $input['address_it'];
        $showroom->phone = $input['phone'];
        $showroom->phone2 = $input['phone2'];
        $showroom->fax = $input['fax'];
        $showroom->email = $input['email'];
        $showroom->lat = $input['lat'];
        $showroom->lng = $input['lng'];

        DB::transaction(function () use ($showroom, $input) {
            if ($showroom->save()) {
                event(new ShowroomUpdated($showroom));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.showroom.update_error'));
        });
    }

    /**
     * @param Model $showroom
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $showroom)
    {
        DB::transaction(function () use ($showroom) {
            if ($showroom->delete()) {
                event(new ShowroomDeleted($showroom));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.showroom.delete_error'));
        });
    }
}

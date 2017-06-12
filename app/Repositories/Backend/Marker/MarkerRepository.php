<?php

namespace App\Repositories\Backend\Marker;

use App\Models\Marker\Marker;
use App\Models\Collection\Collection;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;



/**
 * Class MarkerRepository.
 */
class MarkerRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Marker::class;

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
    public function getForDataTable(Collection $collection)
    {
        return $this->query()->where('collection_id', $collection->id)
            ->select([
                config('markers_table') . '.id',
                config('markers_table') . '.collection_id',
                config('markers_table') . '.title',
                config('markers_table') . '.image',
                config('markers_table') . '.created_at',
            ]);
    }


    /**
     * @param array $input
     * @param Collection $collection
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function create(array $input, Collection $collection)
    {
        DB::transaction(function () use ($input) {
            $marker = self::MODEL;
            $marker = new $marker();
            $marker->collection_id = $input['collection'];
            $marker->code = $input['code'];
            $marker->description = $input['description'];
            $marker->x = $input['x'];
            $marker->y = $input['y'];

            if ($marker->save()) {

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.marker.create_error'));
        });
    }

    /**
     * @param Model $marker
     * @param  $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update(Model $marker, array $input)
    {
        $marker->code = $input['code'];
        $marker->description = $input['description'];
        $marker->x = $input['x'];
        $marker->y = $input['y'];

        DB::transaction(function () use ($marker, $input) {
            if ($marker->save()) {

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.marker.update_error'));
        });
    }

    /**
     * @param Model $marker
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $marker)
    {
        DB::transaction(function () use ($marker) {
            if ($marker->delete()) {

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.marker.delete_error'));
        });
    }
}

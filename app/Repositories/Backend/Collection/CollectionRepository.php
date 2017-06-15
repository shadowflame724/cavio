<?php

namespace App\Repositories\Backend\Collection;

use App\Models\Collection\Collection;
use App\Models\Marker\Marker;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Collection\CollectionCreated;
use App\Events\Backend\Collection\CollectionDeleted;
use App\Events\Backend\Collection\CollectionUpdated;
use App\Http\Controllers\Controller;

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
                config('collections_table') . '.id',
                config('collections_table') . '.title',
                config('collections_table') . '.image',
                config('collections_table') . '.created_at',
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
            $collection = self::MODEL;
            $collection = new $collection();
            $collection->title = $input['title'];
            $collection->description = $input['description'];
            $collection->image = $input['photo'];

            if ($collection->save()) {
                for ($i = 0; $i < 5; $i++) {
                    Marker::create([
                        'collection_id' => $collection->id,
                        'title' => 'Default title',
                        'code' => '#00001',
                        'x' => '679',
                        'y' => '149',
                    ]);
                }
                event(new CollectionCreated($collection));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.collection.create_error'));
        });
    }

    /**
     * @param Model $collection
     * @param  $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update(Model $collection, array $input)
    {
        $collection->title = $input['title'];
        $collection->description = $input['description'];
        $collection->image = $input['photo'];

        DB::transaction(function () use ($collection, $input) {
            if ($collection->save()) {

                event(new CollectionUpdated($collection));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.collection.update_error'));
        });
    }

    /**
     * @param Model $collection
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $collection)
    {
        DB::transaction(function () use ($collection) {

            if ($collection->delete()) {

                event(new CollectionDeleted($collection));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.collection.delete_error'));
        });
    }
}

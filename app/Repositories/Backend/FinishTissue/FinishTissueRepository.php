<?php

namespace App\Repositories\Backend\FinishTissue;

use App\Models\FinishTissue\FinishTissue;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\FinishTissue\FinishTissueCreated;
use App\Events\Backend\FinishTissue\FinishTissueDeleted;
use App\Events\Backend\FinishTissue\FinishTissueUpdated;

/**
 * Class FinishTissueRepository.
 */
class FinishTissueRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = FinishTissue::class;

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
                config('finish_tissue_table') . '.id',
                config('finish_tissue_table') . '.title',
                config('finish_tissue_table') . '.title_ru',
                config('finish_tissue_table') . '.title_it',
                config('finish_tissue_table') . '.type',
                config('finish_tissue_table') . '.image',
            ])
            ->where('parent_id', null)
            ->get();
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
            $finishTissue = self::MODEL;
            $finishTissue = new $finishTissue();
            $finishTissue->title = $input['title'];
            $finishTissue->title_ru = $input['title_ru'];
            $finishTissue->title_it = $input['title_it'];
            $finishTissue->comment = $input['comment'];
            $finishTissue->short = $input['short'];
            $finishTissue->image = $input['photo'];

            switch ($input['parent']) {
                case 'rootFinish': {
                    $finishTissue->parent_id = null;
                    $finishTissue->type = 'finish';
                    break;
                }
                case 'rootTissue': {
                    $finishTissue->parent_id = null;
                    $finishTissue->type = 'tissue';
                    break;
                }
                default: {
                    $parent = FinishTissue::find($input['parent']);
                    $finishTissue->parent_id = $parent->id;
                    $finishTissue->type = $parent->type;
                }

            }

            if ($finishTissue->save()) {
                event(new FinishTissueCreated($finishTissue));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.finishtissue.create_error'));
        });
    }

    /**
     * @param Model $finishTissue
     * @param  $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update(Model $finishTissue, array $input)
    {
        $finishTissue->title = $input['title'];
        $finishTissue->title_ru = $input['title_ru'];
        $finishTissue->title_it = $input['title_it'];
        $finishTissue->comment = $input['comment'];
        $finishTissue->short = $input['short'];

        switch ($input['parent']) {
            case 'rootFinish': {
                $finishTissue->parent_id = null;
                $finishTissue->type = 'finish';
                break;
            }
            case 'rootTissue': {
                $finishTissue->parent_id = null;
                $finishTissue->type = 'tissue';
                break;
            }
            default: {
                $parent = FinishTissue::find($input['parent']);
                $finishTissue->parent_id = $parent->id;
                $finishTissue->type = $parent->type;
                $finishTissue->image = $input['photo'];

            }

        }

        foreach ($finishTissue->children as $child) {
            $child->type = $finishTissue->type;
            $child->save();
        }

        DB::transaction(function () use ($finishTissue, $input) {
            if ($finishTissue->save()) {
                event(new FinishTissueUpdated($finishTissue));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.finishtissue.update_error'));
        });
    }

    /**
     * @param Model $finishTissue
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $finishTissue)
    {
        DB::transaction(function () use ($finishTissue) {
            if ($finishTissue->delete()) {
                event(new FinishTissueDeleted($finishTissue));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.finishtissue.delete_error'));
        });
    }
}

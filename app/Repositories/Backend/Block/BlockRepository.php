<?php

namespace App\Repositories\Backend\Block;

use App\Models\Block\Block;
use App\Models\Page\Page;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Block\BlockCreated;
use App\Events\Backend\Block\BlockDeleted;
use App\Events\Backend\Block\BlockUpdated;

require_once('/var/www/html/test/vendor/kix/mdash/EMT.php');

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
    public function getForDataTable(Page $page)
    {
        return $this->query()->where('page_id', $page->id)
            ->select([
                config('blocks_table') . '.id',
                config('blocks_table') . '.page_id',
                config('blocks_table') . '.title',
                config('blocks_table') . '.image',
                config('blocks_table') . '.created_at',
            ]);
    }


    /**
     * @param array $input
     * @param Page $page
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function create(array $input, Page $page)
    {
        DB::transaction(function () use ($input) {
            $block = self::MODEL;
            $block = new $block();
            $block->page_id = $input['page'];
            $block->title = $input['title'];
            $block->preview = /*clean(EMTypograph::fast_apply(*/
                $input['preview'];
            $block->body = /*clean(EMTypograph::fast_apply(*/
                $input['body'];
            $block->image = $input['image'];

            if ($block->save()) {
                event(new BlockCreated($block));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.block.create_error'));
        });
    }

    /**
     * @param Model $block
     * @param  $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update(Model $block, array $input)
    {
        $block->title = $input['title'];
        $block->preview = clean(\EMTypograph::fast_apply($input['preview']));
        $block->body = clean(\EMTypograph::fast_apply($input['body']));
        $block->image = $input['image'];

        DB::transaction(function () use ($block, $input) {
            if ($block->save()) {
                event(new BlockUpdated($block));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.block.update_error'));
        });
    }

    /**
     * @param Model $block
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $block)
    {
        DB::transaction(function () use ($block) {
            if ($block->delete()) {
                $fileName = public_path('img/backend/upload') . $block->image;
                if (file_exists($fileName) AND $block->image != null) {
                    unlink($fileName);
                }
                event(new BlockDeleted($block));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.block.delete_error'));
        });
    }
}

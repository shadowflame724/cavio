<?php

namespace App\Repositories\Backend\Page;

use App\Models\Block\Block;
use App\Models\Page\Page;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Page\PageCreated;
use App\Events\Backend\Page\PageDeleted;
use App\Events\Backend\Page\PageUpdated;
use EMT\EMTypograph;

/**
 * Class PageRepository
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
                config('pages_table') . '.id',
                config('pages_table') . '.slug',
                config('pages_table') . '.title',
                config('pages_table') . '.created_at',
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
            $page = self::MODEL;
            $page = new $page();
            $page->title = $input['title'];
            $page->title_ru = $input['title_ru'];
            $page->title_it = $input['title_it'];

            if ($input['pageKey']) {
                $page->slug = $input['pageKey'];
            }
            $page->description = $input['description'];
            $page->body = /*EMTypograph::fast_apply(*/
                clean($input['body']);
            $page->body_ru = /*EMTypograph::fast_apply(*/
                clean($input['body_ru']);
            $page->body_it = /*EMTypograph::fast_apply(*/
                clean($input['body_it']);

            if ($page->save()) {

                event(new PageCreated($page));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.page.create_error'));
        });
    }

    /**
     * @param Model $page
     * @param  $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update(Model $page, array $input)
    {
        $page->title = $input['title'];
        $page->title_ru = $input['title_ru'];
        $page->title_it = $input['title_it'];

        if ($input['pageKey']) {
            $page->slug = $input['pageKey'];
        }
        $page->description = $input['description'];
        $page->body = /*EMTypograph::fast_apply(*/
            clean($input['body']);
        $page->body_ru = /*EMTypograph::fast_apply(*/
            clean($input['body_ru']);
        $page->body_it = /*EMTypograph::fast_apply(*/
            clean($input['body_it']);

        DB::transaction(function () use ($page, $input) {
            if ($page->save()) {
                event(new PageUpdated($page));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.page.update_error'));
        });
    }

    /**
     * @param Model $page
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $page)
    {
        DB::transaction(function () use ($page) {

            if ($page->delete()) {
                event(new PageDeleted($page));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.page.delete_error'));
        });
    }
}

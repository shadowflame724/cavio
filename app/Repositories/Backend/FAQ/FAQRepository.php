<?php

namespace App\Repositories\Backend\FAQ;

use App\Models\FAQ\FAQ;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\FAQ\FAQCreated;
use App\Events\Backend\FAQ\FAQDeleted;
use App\Events\Backend\FAQ\FAQUpdated;

/**
 * Class FAQRepository.
 */
class FAQRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = FAQ::class;

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
                config('faqs_table') . '.id',
                config('faqs_table') . '.question',
                config('faqs_table') . '.answer',
                config('faqs_table') . '.created_at',
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
            $faq = self::MODEL;
            $faq = new $faq();
            $faq->question = $input['question'];
            $faq->answer = $input['answer'];

            if ($faq->save()) {
                event(new FAQCreated($faq));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.faq.create_error'));
        });
    }

    /**
     * @param Model $faq
     * @param  $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update(Model $faq, array $input)
    {

        $faq->question = $input['question'];
        $faq->answer = $input['answer'];

        DB::transaction(function () use ($faq, $input) {
            if ($faq->save()) {

                event(new FAQUpdated($faq));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.faq.update_error'));
        });
    }

    /**
     * @param Model $faq
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $faq)
    {
        DB::transaction(function () use ($faq) {

            if ($faq->delete()) {
                event(new FAQDeleted($faq));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.faq.delete_error'));
        });
    }
}

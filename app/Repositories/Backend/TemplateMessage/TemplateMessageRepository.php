<?php

namespace App\Repositories\Backend\TemplateMessage;

use App\Models\TemplateMessage\TemplateMessage;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\TemplateMessage\TemplateMessageCreated;
use App\Events\Backend\TemplateMessage\TemplateMessageDeleted;
use App\Events\Backend\TemplateMessage\TemplateMessageUpdated;

/**
 * Class TemplateMessageRepository.
 */
class TemplateMessageRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = TemplateMessage::class;

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
                config('template_messages_table') . '.id',
                config('template_messages_table') . '.title',
                config('template_messages_table') . '.title_ru',
                config('template_messages_table') . '.title_it',
                config('template_messages_table') . '.type'
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
            $templateMessage = self::MODEL;
            $templateMessage = new $templateMessage();
            $templateMessage->title = $input['title'];
            $templateMessage->title_it = $input['title_it'];
            $templateMessage->title_ru = $input['title_ru'];
            $templateMessage->body = $input['body'];
            $templateMessage->body_ru = $input['body_ru'];
            $templateMessage->body_it = $input['body_it'];
            $templateMessage->type = $input['type'];


            if ($templateMessage->save()) {
                event(new TemplateMessageCreated($templateMessage, $input['admin_comment']));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.templateMessage.create_error'));
        });
    }

    /**
     * @param Model $templateMessage
     * @param  $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update(Model $templateMessage, array $input)
    {

        $templateMessage->title = $input['title'];
        $templateMessage->title_it = $input['title_it'];
        $templateMessage->title_ru = $input['title_ru'];
        $templateMessage->body = $input['body'];
        $templateMessage->body_ru = $input['body_ru'];
        $templateMessage->body_it = $input['body_it'];
        $templateMessage->type = $input['type'];

        DB::transaction(function () use ($templateMessage, $input) {
            if ($templateMessage->save()) {

                event(new TemplateMessageUpdated($templateMessage, $input['admin_comment']));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.templateMessage.update_error'));
        });
    }

    /**
     * @param Model $templateMessage
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Model $templateMessage)
    {
        DB::transaction(function () use ($templateMessage) {

            if ($templateMessage->delete()) {
                event(new TemplateMessageDeleted($templateMessage));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.templateMessage.delete_error'));
        });
    }
}

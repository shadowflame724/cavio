<?php

namespace App\Repositories\Backend\Popup;

use App\Models\Popup\Popup;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Popup\PopupUpdated;

/**
 * Class PopupRepository.
 */
class PopupRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Popup::class;

    /**
     * @param Model $popup
     * @param  $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update(Model $popup, array $input)
    {
        $popup->title = $input['title'];
        $popup->title_ru = $input['title_ru'];
        $popup->title_it = $input['title_it'];
        $popup->body = $input['body'];
        $popup->body_ru = $input['body_ru'];
        $popup->body_it = $input['body_it'];
        $popup->image = $input['photo'];
        $popup->link = $input['link'];

        if (isset($input['show'])) {
            $popup->show = 1;
        }else{
            $popup->show = 0;
        }


        DB::transaction(function () use ($popup, $input) {
            if ($popup->save()) {

                event(new PopupUpdated($popup, $input['admin_comment']));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.popup.update_error'));
        });
    }
}

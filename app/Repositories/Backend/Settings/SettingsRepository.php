<?php

namespace App\Repositories\Backend\Settings;

use App\Models\Settings\Settings;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Settings\SettingsUpdated;

/**
 * Class SettingsRepository.
 */
class SettingsRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Settings::class;

    /**
     * @param Model $settings
     * @param  $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function update(Model $settings, array $input)
    {
        $settings->soc_links = $input['title'];
        $settings->title_ru = $input['title_ru'];
        $settings->title_it = $input['title_it'];
        $settings->body = $input['body'];
        $settings->body_ru = $input['body_ru'];
        $settings->body_it = $input['body_it'];
        $settings->image = $input['photo'];
        $settings->link = $input['link'];
        if ($input['show']) {
            $settings->show = 1;
        } else {
            $settings->show = 0;
        }

        DB::transaction(function () use ($settings, $input) {
            if ($settings->save()) {

                event(new SettingsUpdated($settings, $input['admin_comment']));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.Settings.update_error'));
        });
    }
}

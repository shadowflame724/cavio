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
        $settings->soc_links = json_encode($input['soc_links']);
        $settings->discount_data = json_encode($input['discount_data']);
        $settings->koef_data = json_encode(str_replace(',', '.', preg_replace("/[^0-9,.]/", "",$input['koef_data'])));

        DB::transaction(function () use ($settings, $input) {
            if ($settings->save()) {

                event(new SettingsUpdated($settings, $input['admin_comment']));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.settings.update_error'));
        });
    }
}

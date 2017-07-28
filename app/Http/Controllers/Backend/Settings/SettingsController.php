<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Events\Backend\Settings\SettingsUpdated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Settings\UpdateSettingsRequest;
use App\Models\Settings\Settings;
use App\Repositories\Backend\Settings\SettingsRepository;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * @var SettingsRepository
     */
    protected $settings;

    /**
     * @param SettingsRepository $settings
     */
    public function __construct(SettingsRepository $settings)
    {
        $this->settings = $settings;
    }
    
    /**
     *
     * @return mixed
     */
    public function edit()
    {
        $settings = Settings::firstOrCreate(['id' => 1], [
            'soc_links' => '[]',
            'discount_data' => '[]',
            'koef_data' => '[]'
        ]);

        $socLinksArr = json_decode($settings->soc_links);
        $discountDataArr = json_decode($settings->discount_data);
        $koefData = json_decode($settings->koef_data);

        return view('backend.settings.edit', [
            'settings' => $settings,
            'koefData' => $koefData,
            'socLinksArr' => $socLinksArr,
            'discountDataArr' => $discountDataArr
        ]);
    }

    /**
     * @param UpdateSettingsRequest $request
     *
     * @return mixed
     */
    public function update(UpdateSettingsRequest $request)
    {
        $settings = Settings::find(1);

        $this->settings->update($settings, $request->all());

        return redirect()->route('admin.settings.edit')->withFlashSuccess(trans('alerts.backend.settings.updated'));
    }
}

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
        $socLinksArr = [
            'fb' => 'https://facebook.com',
            'youtube'=> 'https://youtube.com',
            'instagram' => 'https://instagram.com',
            'pinterest' => 'https://pinterest.com'
        ];
        $settings = Settings::firstOrCreate(['id' => 1], [
            'soc_links' => json_encode($socLinksArr),
            'discount_data' => '[]',
            'koef_data' => '[]',
            'vat_data' => '[]'
        ]);

        $socLinksArr = json_decode($settings->soc_links);
        $discountDataArr = json_decode($settings->discount_data);
        $koefData = json_decode($settings->koef_data);
        $vatData = json_decode($settings->vat_data);
        //dd($socLinksArr);

        return view('backend.settings.edit', [
            'settings' => $settings,
            'koefData' => $koefData,
            'vatData' => $vatData,
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

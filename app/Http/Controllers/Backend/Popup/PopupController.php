<?php

namespace App\Http\Controllers\Backend\Popup;

use App\Events\Backend\Popup\PopupUpdated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Popup\UpdatePopupRequest;
use App\Models\Popup\Popup;
use App\Repositories\Backend\Popup\PopupRepository;
use Illuminate\Http\Request;

class PopupController extends Controller
{
    /**
     * @var PopupRepository
     */
    protected $popup;

    /**
     * @param PopupRepository $popup
     */
    public function __construct(PopupRepository $popup)
    {
        $this->popup = $popup;
    }
    
    /**
     *
     * @return mixed
     */
    public function edit()
    {
        $popup = Popup::find(1);

        return view('backend.popup.edit', [
            'popup' => $popup,
        ]);
    }

    /**
     * @param UpdatePopupRequest $request
     *
     * @return mixed
     */
    public function update(UpdatePopupRequest $request)
    {
        $popup = Popup::find(1);
        $oldName = $popup->image;
        $this->popup->update($popup, $request->all());
        $this->moveImg($request->photo, $oldName);

        return redirect()->route('admin.popup.edit')->withFlashSuccess(trans('alerts.backend.popup.updated'));
    }
}

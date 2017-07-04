<?php

namespace App\Http\Controllers\Backend\Popup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Popup\UpdatePopupRequest;
use App\Models\Popup\Popup;
use Illuminate\Http\Request;

class PopupController extends Controller
{
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
     * @param Popup $popup
     * @param UpdatePopupRequest $request
     *
     * @return mixed
     */
    public function update(Popup $popup, UpdatePopupRequest $request)
    {
        $popup = Popup::find(1);
        $oldName = $popup->image;

        $popup->title = $request->title;
        $popup->title_ru = $request->title_ru;
        $popup->title_it = $request->title_it;
        $popup->body = $request->body;
        $popup->body_ru = $request->body_ru;
        $popup->body_it = $request->body_it;

        $popup->image = $request->photo;
        $popup->link = $request->link;
        if ($request->show){
            $popup->show = 1;
        }else{
            $popup->show = 0;
        }
        $popup->save();

        $this->moveImg($request->photo, $oldName);

        return redirect()->route('admin.popup.edit')->withFlashSuccess(trans('alerts.backend.popup.updated'));
    }
}

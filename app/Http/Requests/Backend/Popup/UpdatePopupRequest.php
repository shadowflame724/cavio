<?php

namespace App\Http\Requests\Backend\Popup;

use App\Http\Requests\Request;

/**
 * Class UpdatePopupRequest.
 */
class UpdatePopupRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->hasRole(1);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => "required|min:3|max:40",
            'title_ru' => "required|min:3|max:40",
            'title_it' => "required|min:3|max:40",
            'body' => "required|max:250",
            'body_ru' => "required|max:250",
            'body_it' => "required|max:250",
            'link' => "max:20"
        ];
    }
}

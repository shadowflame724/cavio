<?php

namespace App\Http\Requests\Backend\FinishTissue;

use App\Http\Requests\Request;

/**
 * Class UpdateFinishTissueRequest.
 */
class UpdateFinishTissueRequest extends Request
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
            'title' => "required|max:35",
            'title_ru' => "required|max:35",
            'title_it' => "required|max:35",
            'comment' => "required|max:200",
            'short' => "required|max:10",
            'type' => "required",
            'parent' => "required",
            'photo' => "required",
        ];
    }
}

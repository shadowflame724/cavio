<?php

namespace App\Http\Requests\Backend\News;

use App\Http\Requests\Request;

/**
 * Class UpdateNewsRequest.
 */
class UpdateNewsRequest extends Request
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
            'name' => "required|min:3|max:191",
            'name_ru' => "required|min:3|max:191",
            'name_it' => "required|min:3|max:191",
            'preview' => "required|min:3|max:250",
            'preview_ru' => "required|min:3|max:250",
            'preview_it' => "required|min:3|max:250",
            'body' => "required|min:3",
            'body_ru' => "required|min:3",
            'body_it' => "required|min:3",
            'admin_comment' => "required",

        ];
    }
}

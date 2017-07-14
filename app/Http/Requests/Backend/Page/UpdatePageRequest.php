<?php

namespace App\Http\Requests\Backend\Page;

use App\Http\Requests\Request;

/**
 * Class UpdatePageRequest.
 */
class UpdatePageRequest extends Request
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
            'title' => "required|min:3|max:35",
            'title_ru' => "required|min:3|max:35",
            'title_it' => "required|min:3|max:35",
            'description' => "required|min:3",
            'pageKey' => "max:40",
            'body' => "required|min:3",
            'body_ru' => "required|min:3",
            'body_it' => "required|min:3",
            'blocks.*.title' => "max:35",
            'blocks.*.title_ru' => "max:35",
            'blocks.*.title_it' => "max:35",
            'blocks.*.body' => "max:700",
            'blocks.*.body_ru' => "max:700",
            'blocks.*.body_it' => "max:700",
        ];
    }
}

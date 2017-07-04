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
            'title' => "required|min:3|max:191",
            'title_ru' => "required|min:3|max:191",
            'title_it' => "required|min:3|max:191",
            'description' => "required",
            'blocks.*.title' => "max:191",
            'blocks.*.title_ru' => "max:191",
            'blocks.*.title_it' => "max:191",
            'blocks.*.body' => "max:500",
            'blocks.*.body_ru' => "max:500",
            'blocks.*.body_it' => "max:500",


        ];
    }
}

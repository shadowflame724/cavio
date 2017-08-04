<?php

namespace App\Http\Requests\Backend\Page;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class StorePageRequest.
 */
class StorePageRequest extends Request
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
            'body' => "required|min:3",
            'body_ru' => "required|min:3",
            'body_it' => "required|min:3",
            'admin_comment' => "required",

        ];

    }
}

<?php

namespace App\Http\Requests\Backend\Category;

use App\Http\Requests\Request;

/**
 * Class UpdateCategoryRequest.
 */
class UpdateCategoryRequest extends Request
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
            'name' => 'required|min:3|max:35',
            'name_ru' => 'required|min:3|max:35',
            'name_it' => 'required|min:3|max:35',
            'image' => 'required|min:3'
        ];
    }
}

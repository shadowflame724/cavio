<?php

namespace App\Http\Requests\Backend\Product;

use App\Http\Requests\Request;

/**
 * Class UpdateProductRequest.
 */
class UpdateProductRequest extends Request
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
            'code' => "required|min:3|max:191",
            'category_ids' => 'required',

            'name' => "required|min:3|max:191",
            'name_ru' => "required|min:3|max:191",
            'name_it' => "required|min:3|max:191",
            'prev' => "required|min:3|max:1000",
            'prev_ru' => "required|min:3|max:1000",
            'prev_it' => "required|min:3|max:1000",

        ];
    }
}

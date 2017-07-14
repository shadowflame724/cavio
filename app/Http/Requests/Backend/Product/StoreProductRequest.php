<?php

namespace App\Http\Requests\Backend\Product;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class StoreProductRequest.
 */
class StoreProductRequest extends Request
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
            'collectionZone_id' => 'required',
            'finishTissues_id' => 'required',
            'images' => 'required',
            'code' => "required|min:3|max:191",
            'name' => "required|min:3|max:30",
            'name_ru' => "required|min:3|max:30",
            'name_it' => "required|min:3|max:30",
            'category_id' => 'required',

            'description' => "required|min:3|max:191",
            'description_ru' => "required|min:3|max:191",
            'description_it' => "required|min:3|max:191",

            'dimensions.*.length' => "required|min:1|max:5",
            'dimensions.*.width' => "required|min:1|max:5",
            'dimensions.*.height' => "required|min:1|max:5",
            'dimensions.*.mattress' => "required|min:1|max:20",
            'dimensions.*.weight' => "required|min:1|max:5"
        ];

    }
}

<?php

namespace App\Http\Requests\Backend\Collection;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class StorePageRequest.
 */
class StoreCollectionRequest extends Request
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
            'description' => "required|min:3|max:400",
            'description_ru' => "required|min:3|max:400",
            'description_it' => "required|min:3|max:400",
            'photo' => 'required',

        ];

    }
}

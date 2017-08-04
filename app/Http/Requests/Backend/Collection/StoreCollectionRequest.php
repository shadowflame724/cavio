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
            'name' => "required|min:3|max:35",
            'name_ru' => "required|min:3|max:35",
            'name_it' => "required|min:3|max:35",
            'prev' => "required|min:3|max:400",
            'prev_ru' => "required|min:3|max:400",
            'prev_it' => "required|min:3|max:400",
            'photo' => 'required',
            'title' => "max:191",
            'title_ru' => "max:191",
            'title_it' => "max:191",
            'description' => "max:1000",
            'description_ru' => "max:1000",
            'description_it' => "max:1000",

        ];

    }
}

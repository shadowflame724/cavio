<?php

namespace App\Http\Requests\Backend\Collection;

use App\Http\Requests\Request;

/**
 * Class UpdateCollectionRequest.
 */
class UpdateCollectionRequest extends Request
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
            'name' => "required|min:3|max:35",
            'name_ru' => "required|min:3|max:35",
            'name_it' => "required|min:3|max:35",
            'prev' => "required|min:3|max:400",
            'prev_ru' => "required|min:3|max:400",
            'prev_it' => "required|min:3|max:400",
            'photo' => 'required',
            'zones.*.title' => "required|max:35",
            'zones.*.title_ru' => "required|max:35",
            'zones.*.title_it' => "required|max:35",
            'zones.*.name' => "required|min:3|max:35",
            'zones.*.name_ru' => "required|min:3|max:35",
            'zones.*.name_it' => "required|min:3|max:35",
            'zones.*.description' => "required|min:3|max:400",
            'zones.*.description_ru' => "required|min:3|max:400",
            'zones.*.description_it' => "required|min:3|max:400",
            'zones.*.photo' => "required",
            'zones.*.zone_id' => "required",
        ];
    }
}

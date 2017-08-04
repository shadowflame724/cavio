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
            'name' => "required|min:3|max:35",
            'name_ru' => "required|min:3|max:35",
            'name_it' => "required|min:3|max:35",
            'prev' => "required|min:3|max:400",
            'prev_ru' => "required|min:3|max:400",
            'prev_it' => "required|min:3|max:400",
            'photo' => 'required',
            'zones.*.name' => "required|min:3|max:35",
            'zones.*.name_ru' => "required|min:3|max:35",
            'zones.*.name_it' => "required|min:3|max:35",
            'zones.*.photo' => "required",
            'zones.*.zone_id' => "required",
        ];
    }
}

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
            'title' => "required|min:3|max:191",
            'description' => "required|min:3",
            'zones.*.title' => "required|max:40",
            'zones.*.photo' => "required",
            'zones.*.zone_id' => "required",
        ];
    }
}

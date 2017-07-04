<?php

namespace App\Http\Requests\Backend\Marker;

use App\Http\Requests\Request;

/**
 * Class UpdateMarkerRequest.
 */
class UpdateMarkerRequest extends Request
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
            'markers.*.code' => 'required',
            'markers.*.title' => 'required|min:3|max:30',
            'markers.*.title_ru' => 'required|min:3|max:30',
            'markers.*.title_it' => 'required|min:3|max:30',
        ];
    }
}

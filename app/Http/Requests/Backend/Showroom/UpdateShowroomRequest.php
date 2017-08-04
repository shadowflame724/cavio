<?php

namespace App\Http\Requests\Backend\Showroom;

use App\Http\Requests\Request;

/**
 * Class UpdateShowroomRequest.
 */
class UpdateShowroomRequest extends Request
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
            'country' => 'required|max:35',
            'country_ru' => 'required|max:35',
            'country_it' => 'required|max:35',
            'city' => 'required|max:35',
            'city_ru' => 'required|max:35',
            'city_it' => 'required|max:35',
            'name' => 'max:191',
            'name_ru' => 'max:191',
            'name_it' => 'max:191',
            'address' => 'max:191',
            'address_ru' => 'max:191',
            'address_it' => 'max:191',
            'phone' => 'numeric',
            'email' => 'max:35|email',
        ];
    }
}

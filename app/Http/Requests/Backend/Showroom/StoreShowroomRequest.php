<?php

namespace App\Http\Requests\Backend\Showroom;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class StorePageRequest.
 */
class StoreShowroomRequest extends Request
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
            'city' => 'required|max:35',
            'name' => 'max:191',
            'address' => 'max:191',
            'phone' => 'numeric',
            'email' => 'max:35|email',
        ];

    }
}

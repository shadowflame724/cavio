<?php

namespace App\Http\Requests\Frontend\Basket;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class StoreCategoryRequest.
 */
class StoreOrderRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|max:191',
            'first_name' => 'required|min:1|max:191',
            'last_name' => 'required|min:1|max:191',
            'phone' => 'required|min:9|max:20',
            'region' => 'required|min:1|max:191',
            'city' => 'required|min:1|max:191',
            'zip_code' => 'required|min:3|max:10'
        ];

    }
}

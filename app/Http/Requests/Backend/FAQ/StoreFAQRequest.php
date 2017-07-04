<?php

namespace App\Http\Requests\Backend\FAQ;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class StorePageRequest.
 */
class StoreFAQRequest extends Request
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
            'question' => "required|min:3|max:200",
            'answer' => "required|min:3|max:400",
        ];

    }
}

<?php

namespace App\Http\Requests\Backend\Good;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class StoreGoodRequest.
 */
class StoreGoodRequest extends Request
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
            'code' => "required|min:3|max:191",
            'name' => "required|min:3|max:191",
            'dimensions' => "required|min:3|max:191",
            'tissue' => "required|min:3|max:191",
            'finish' => "required|min:3|max:191",
            'description' => "required|min:3",
        ];

    }
}

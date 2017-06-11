<?php

namespace App\Http\Requests\Backend\Block;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class StoreBlockRequest.
 */
class StoreBlockRequest extends Request
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
            'title' => 'required|min:3|max:191',
            'preview' => 'required|min:6',
            'body' => 'required|min:6'
        ];

    }
}

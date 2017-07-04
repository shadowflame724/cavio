<?php

namespace App\Http\Requests\Backend\Message;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class StoreMessageRequest.
 */
class StoreMessageRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => "required|max:30",
            'email' => "required|email",
            'content' => "required|min:3|max:500",
        ];

    }
}

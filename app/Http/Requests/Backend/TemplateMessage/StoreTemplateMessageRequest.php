<?php

namespace App\Http\Requests\Backend\TemplateMessage;

use App\Http\Requests\Request;


/**
 * Class StoreTemplateMessageRequest.
 */
class StoreTemplateMessageRequest extends Request
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
            'title' => "required|min:3",
            'title_ru' => "required|min:3",
            'title_it' => "required|min:3",
            'body' => "required|min:3",
            'body_ru' => "required|min:3",
            'body_it' => "required|min:3",
            'type' => 'required',
            'admin_comment' => "required"
        ];
    }
}

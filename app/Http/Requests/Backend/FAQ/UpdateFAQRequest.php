<?php

namespace App\Http\Requests\Backend\FAQ;

use App\Http\Requests\Request;

/**
 * Class UpdateFAQRequest.
 */
class UpdateFAQRequest extends Request
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
            'question_ru' => "required|min:3|max:200",
            'question_it' => "required|min:3|max:200",
            'answer' => "required|min:3|max:400",
            'answer_ru' => "required|min:3|max:400",
            'answer_it' => "required|min:3|max:400",
            'admin_comment' => "required"
        ];
    }
}

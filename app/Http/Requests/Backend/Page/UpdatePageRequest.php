<?php

namespace App\Http\Requests\Backend\Page;

use App\Http\Requests\Request;

/**
 * Class UpdatePageRequest.
 */
class UpdatePageRequest extends Request
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
            'pageKey' => "required|min:3|max:191",
            'title' => "required|min:3|max:191",
            'description' => "required|min:6",
            'body' => "required|min:6"
        ];
    }
}

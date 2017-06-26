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
            'title' => "required|min:3|max:191",
        ];
    }
}

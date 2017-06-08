<?php

namespace App\Http\Requests\Backend\Access\News;

use App\Http\Requests\Request;

/**
 * Class UpdateNewsRequest.
 */
class UpdateNewsRequest extends Request
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
            'description' => "required|min:3",
            'preview' => "required|min:3",
            'body' => "required|min:3",
            'file' => 'image|mimes:jpeg,bmp,png'
        ];
    }
}

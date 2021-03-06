<?php

namespace App\Http\Requests\Backend\Document;

use App\Http\Requests\Request;

/**
 * Class UpdateDocumentRequest.
 */
class UpdateDocumentRequest extends Request
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
            'name' => "required|min:3|max:191",
        ];
    }
}

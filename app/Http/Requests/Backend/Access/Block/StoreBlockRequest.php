<?php

namespace App\Http\Requests\Backend\Access\Page;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class StorePageRequest.
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
            'title' => 'required|max:191',
            'description' => 'required',
            'prev' => 'required',
            'body' => 'required|min:6',
            'image' => $this->file()
        ];

    }
}

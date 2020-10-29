<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => ['required', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string'],
            'content' => ['required', 'string'],
            'status' => ['required', 'in:on,off'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ];
    }
}

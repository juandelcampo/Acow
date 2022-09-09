<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'category' => 'required|alpha'
        ];
    }

    public function messages()
    {
        return [
            'category.required' => 'A category is required'
        ];
    }
}

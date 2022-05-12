<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class AuthorRequest extends FormRequest
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
        return[
            'author' => 'required|string|max:150|',
            'lifetime' => 'required|alpha_dash',
            'nationality' => 'required|max:25|alpha',
            'url' => 'required|url'
        ];
    }

    public function failedValidation(Validator $validator)
    {

    }
}

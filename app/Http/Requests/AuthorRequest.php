<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;

class AuthorRequest extends Request
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
    public function rules():array
    {
         return [
           'author' => 'required|string|max:150',
            'lifetime' => 'required|alpha_dash',
            'nationality' => 'required|max:25|alpha',
            'url' => 'required|url',
        ];
    }

    public function messages()
    {
        return [
            'author.required' => 'A name is required',
            'lifetime.required' => 'A lifetime is required',
            'nationality.required' => 'A nationality date is required',
            'url.required' => 'A website is required'
        ];
    }

    // public function failedValidation(Validator $validator)
    // {

    // }



}

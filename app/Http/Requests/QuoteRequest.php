<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class QuoteRequest extends Request
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
            'quote' => 'required|string',
            'author_id' => 'required|integer|exists:authors,id',
            'publish_date' => 'required|alpha_dash',
            'categories' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'quote.required' => 'A quote is required',
            'author_id.required' => 'An author is required',
            'publish_date.required' => 'A publish date is required',
            'categories.required' => 'A category is required'
        ];
    }

    public function failedValidation(Validator $validator)
    {

    }
}


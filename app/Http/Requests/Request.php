<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class Request extends FormRequest
{
    public function validateStructure()
    {
        return $this->validate($this->rules());
    }

}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginReuest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'login' => 'required|string|min:1|max:32',
            'password' => 'required|string|min:1|max:255',
        ];
    }
}

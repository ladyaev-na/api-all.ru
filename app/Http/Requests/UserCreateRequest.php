<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'surname' => 'required|string|min:1|max:32|regex:/^[а-яА-ЯёЁ ]+$/u',
            'name' => 'required|string|min:1|max:64',
            'login' => 'required|string|min:1|max:32|unique:users',
            'password' => 'required|string|min:1|max:255'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'surname' => 'string|min:1|max:32|regex:/^[а-яА-ЯёЁ ]+$/u',
            'name' => 'string|min:1|max:64',
            'login' => 'string|min:1|max:32|unique:users',
            'password' => 'string|min:1|max:255',
            'role_id' => 'integer|exists:roles,id'
        ];
    }
}

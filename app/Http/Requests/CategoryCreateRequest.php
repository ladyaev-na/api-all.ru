<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|min:1|max:255|unique:categories'
        ];
    }

    public function messages()
    {
        return[
            'required' => 'Поле :attribute не должно быть пустым.',
            'name.unique' => 'Такая категорией уже сушествует.'
        ];
    }
}

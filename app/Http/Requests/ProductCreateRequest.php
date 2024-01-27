<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:1|max:127',
            'price' => 'required|decimal:0,2|min:0.01',
            'quantity' => 'required|integer|min:0',
            'category_id' => 'required|integer|exists:categories,id'
        ];
    }
    public function messages()
    {
        return[
            'name.max' => 'Поле имя не должно превышать 255 символа.'
        ];
    }
}

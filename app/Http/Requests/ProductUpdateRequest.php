<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends ApiRequest
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
            'name' => 'string|min:1|max:127',
            'price' => 'decimal:0,2|min:0.01',
            'quantity' => 'integer|min:0',
            'category_id' => 'integer|exists:categories,id'
        ];
    }
}

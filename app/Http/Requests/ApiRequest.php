<?php

namespace App\Http\Requests;

use App\Exceptions\ApiException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ApiRequest extends FormRequest
{
    //Провал авторизации
   function failedAuthorization()
    {
        throw new ApiException(401, 'Аутинфикация провалена');
    }

    //Провал валидации
    function failedValidation(Validator $validator)
    {
        throw new ApiException(422, 'Ошибка валидации данных', $validator->errors());
    }
}

<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiException extends HttpResponseException
{
    public function __construct($code, $message, $errors = [])
    {
        // Формируем переменную с ответом при вызове исключения
        $response = [
            'code' => $code,
            'message' => $message,
        ];

        // Проверяем, есть ли данные в переменной errors
        if (count($errors)){
            $response['errors'] = $errors;
        }
        parent::__construct(response()->json($response)->setStatusCode($code, $message));
    }
}

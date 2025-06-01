<?php

namespace App\Classes\Api\v1;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class FormRequestHandler extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Solicitud no válida',
                'errors' => $validator->errors()
            ], Response::HTTP_BAD_REQUEST)
        );
    }
}

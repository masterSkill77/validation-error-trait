<?php

namespace Masterskill\ValidationErrorTrait;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ValidationErrorTrait
{

    /**
     * Handle the failed validation in RESTFull way in Laravel
     * @param \Illuminate\Contracts\Validation\Validator $validator The validator
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */

    protected function failedValidation(Validator $validator): JsonResponse
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], Response::HTTP_BAD_REQUEST));
    }
}

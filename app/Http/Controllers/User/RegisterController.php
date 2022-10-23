<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Models\User;
use function response;
use App\Models\ResponseMessages;
use App\Models\Other\BadMessages;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Register;
use Symfony\Component\HttpFoundation\Response;
use UseCases\User\Register as RegisterUseCase;

class RegisterController extends Controller
{
    public function register(Register $request, RegisterUseCase $use_case)
    {
//        if (auth()->user()->cannot('create', User::class)) {
//            return response(['message' => trans(BadMessages::HAS_NO_ACCESS)], Response::HTTP_FORBIDDEN);
//        }
        $use_case->register($request);

        return response(['message' => trans(ResponseMessages::EMAIL_CONFIRM)], Response::HTTP_CREATED);
    }
}

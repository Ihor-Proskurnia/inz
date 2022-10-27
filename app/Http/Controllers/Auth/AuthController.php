<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Log;
use Throwable;
use App\Models\ResponseMessages;
use App\Models\Other\BadMessages;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use UseCases\Auth\Auth as AuthUseCase;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\ForgotRequest;
use App\Http\Resources\Auth\LoginResource;
use Symfony\Component\HttpFoundation\Response;
use UseCases\Contracts\ResponseObjects\IError;
use App\Http\Requests\Auth\ChangePasswordRequest;

/**
 * @see AuthControllerOA
 */
class AuthController extends Controller
{
    public function login(LoginRequest $request, AuthUseCase $use_case)
    {
        $response = $use_case->login($request);

        if ($response instanceof IError) {
            return response(['message' => $response->getMessage()], Response::HTTP_BAD_REQUEST);
        }

        $resource = new LoginResource($response);

        return $resource->response()->setStatusCode(Response::HTTP_CREATED);
    }

    public function logout()
    {
        try {
            Auth::user()->notMobiletokens()->delete();
        } catch (Throwable $e) {
            Log::error('LOGOUT ERROR');
        } finally {
            return response()->json(['message' => trans('auth.logout')], Response::HTTP_OK);
        }
    }

//    public function forgot(ForgotRequest $request, AuthUseCase $use_case)
//    {
//        $use_case->forgot($request);
//
//        return response(['message' => trans(ResponseMessages::FORGOT)], Response::HTTP_CREATED);
//    }


    public function changePassword(ChangePasswordRequest $request, AuthUseCase $use_case)
    {
        $user = auth()->user();
        if (!isset($user)) {
            return response(['message' => trans(BadMessages::PASSWORD_USER_NOT_CHANGED)], Response::HTTP_BAD_REQUEST);
        }
        $response = $use_case->changePassword($request, $user);

        return response(['message' => trans($response->getMessage())], Response::HTTP_CREATED);
    }
}

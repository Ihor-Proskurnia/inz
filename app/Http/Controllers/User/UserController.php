<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Models\User;
use UseCases\User\UserCase;
use UseCases\User\UserDrivers;
use App\Models\ResponseMessages;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Http\Requests\User\UsersListRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Symfony\Component\HttpFoundation\Response;
use UseCases\Contracts\ResponseObjects\IError;
use App\Http\Requests\User\ActivateUserRequest;
use App\Http\Resources\User\UsersCollectionResource;
use App\Http\Resources\User\DriversCollectionResource;

/**
 * @see UserControllerOA
 */
class UserController extends Controller
{
    public function showUsers(UsersListRequest $request, UserCase $use_case)
    {
        $response = $use_case->showUsers($request);
        $resource = new UsersCollectionResource($response);

        return $resource->response()->setStatusCode(Response::HTTP_OK);
    }
}

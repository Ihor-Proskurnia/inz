<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use UseCases\User\UserCase;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UsersListRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\User\UsersCollectionResource;

class UserController extends Controller
{
    public function showUsers(UsersListRequest $request, UserCase $use_case)
    {
        $response = $use_case->showUsers($request);
        $resource = new UsersCollectionResource($response);

        return $resource->response()->setStatusCode(Response::HTTP_OK);
    }

    public function show(User $user, UserCase $use_case)
    {
        $user_id = $user->id;
        $user = $use_case->showUser($user_id);
        $resource = new UserResource($user);

        return $resource->response()->setStatusCode(Response::HTTP_OK);
    }

    public function update(UpdateUserRequest $request, UserCase $use_case)
    {
        $user_id = auth()->id();
        $response = $use_case->update($request, $user_id);
        $resource = new UserResource($response);

        return $resource->response()->setStatusCode(Response::HTTP_OK);
    }

    public function me(UserCase $use_case)
    {
        $user_id = auth()->id();
        $user = $use_case->showUser($user_id);
        return new UserResource($user);
    }
}

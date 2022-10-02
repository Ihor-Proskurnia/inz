<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use UseCases\User\UserCase;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UsersListRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\User\UsersCollectionResource;

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

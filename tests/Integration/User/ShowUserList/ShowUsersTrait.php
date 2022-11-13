<?php

namespace Tests\Integration\User\ShowUserList;

use function app;
use App\Http\Requests\User\UsersListRequest;

trait ShowUsersTrait
{
    public function createRequest(array $data): UsersListRequest
    {
        $request = new UsersListRequest($data);
        $request
            ->setContainer(app())
            ->validateResolved();

        return $request;
    }
}

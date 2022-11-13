<?php

declare(strict_types=1);

namespace User\Contracts;

use UseCases\Contracts\User\IUsersListRequest;

interface IUserCommand
{
    public function showUsers(IUsersListRequest $query_param);
}

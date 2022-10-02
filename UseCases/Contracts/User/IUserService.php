<?php

declare(strict_types=1);

namespace UseCases\Contracts\User;

use Illuminate\Pagination\LengthAwarePaginator;

interface IUserService
{
    public function showUsers(IUsersListRequest $query_param): LengthAwarePaginator;
}

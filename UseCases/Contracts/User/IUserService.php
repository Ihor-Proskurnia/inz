<?php

declare(strict_types=1);

namespace UseCases\Contracts\User;

use Illuminate\Pagination\LengthAwarePaginator;

interface IUserService
{
    public function showUsers(IUsersListRequest $query_param): LengthAwarePaginator;
    public function showUser(int $user_id): \UseCases\Contracts\User\Entities\IUser;
}

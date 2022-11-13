<?php

namespace User\Contracts;

use App\Models\User;
use UseCases\Contracts\User\Entities\IUser;
use UseCases\Contracts\Requests\User\IUpdateUserRequest;

interface IUpdateUser
{
    public function update(IUpdateUserRequest $data_provider, int $user_id): IUser;
}

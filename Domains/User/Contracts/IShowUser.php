<?php

namespace User\Contracts;

use UseCases\Contracts\User\Entities\IUser;

interface IShowUser
{
    public function show(int $user_id): IUser;
}

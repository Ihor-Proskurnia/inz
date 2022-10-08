<?php

namespace User;

use User\Entities\User;
use User\Contracts\IShowUser;
use UseCases\Contracts\User\Entities\IUser;

class ShowUser implements IShowUser
{
    /**
     * @var User
     */
    public User $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function show(int $user_id): IUser
    {
        return $this->user->getUser($user_id);
    }
}

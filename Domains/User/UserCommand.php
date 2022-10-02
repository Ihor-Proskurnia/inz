<?php

declare(strict_types=1);

namespace User;

use User\Contracts\IUserCommand;
use User\Entities\User;
use User\Filters\UserFilter;
use Illuminate\Foundation\Application;
use UseCases\Contracts\User\IUsersListRequest;

class UserCommand implements IUserCommand
{
    /**
     * @var Application
     */
    public Application $app;
    /**
     * @var User
     */
    public User $user;

    /**
     * @param Application $app
     * @param User $user
     */
    public function __construct(Application $app, User $user)
    {
        $this->app = $app;
        $this->user = $user;
    }


    public function showUsers(IUsersListRequest $query_param)
    {
        $data = $query_param->validated();

        $filter = $this->app->make(UserFilter::class, ['queryParams' => array_filter($data)]);

        $query = $this->user->filter($filter);

        return $query->with('roles')->paginate($query_param->getPerPage());
    }
}

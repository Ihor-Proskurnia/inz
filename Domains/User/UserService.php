<?php

declare(strict_types=1);

namespace User;

use UseCases\Contracts\User\IUserService;
use Illuminate\Foundation\Application;
use User\Contracts\IShowUser;
use User\Contracts\IUserCommand;
use UseCases\Contracts\User\IUsersListRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService implements IUserService
{
    /**
     * @var Application
     */
    public Application $app;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function showUsers(IUsersListRequest $query_param): LengthAwarePaginator
    {
        /* @var IUserCommand $show_users */
        $show_users = $this->app->make(UserCommand::class);

        return $show_users->showUsers($query_param);
    }

    public function showUser(int $user_id): \UseCases\Contracts\User\Entities\IUser
    {
        /* @var IShowUser $show_user */
        $show_users = $this->app->make(ShowUser::class);

        return $show_users->show($user_id);
    }
}

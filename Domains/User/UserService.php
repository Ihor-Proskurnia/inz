<?php

declare(strict_types=1);

namespace User;

use App\Models\Other\BadMessages;
use App\Models\User;
use UseCases\Contracts\Requests\Auth\IRegisterUser;
use UseCases\Contracts\Requests\User\IUpdateUserRequest;
use UseCases\Contracts\User\IUser;
use Illuminate\Foundation\Application;
use User\Contracts\IRegister;
use User\Contracts\IShowUser;
use User\Contracts\IUpdateUser;
use User\Contracts\IUserCommand;
use UseCases\Contracts\User\IUsersListRequest;
use Illuminate\Pagination\LengthAwarePaginator;
use User\Entities\UserResponseFactory;

class UserService implements IUser
{
    /**
     * @var Application
     */
    public Application $app;
    /**
     * @var UserResponseFactory
     */
    private UserResponseFactory $response_factory;

    /**
     * @param Application $app
     * @param UserResponseFactory $response_factory
     */
    public function __construct(Application $app, UserResponseFactory $response_factory)
    {
        $this->app = $app;
        $this->response_factory = $response_factory;
    }

    public function register(IRegisterUser $request)
    {
        /* @var IRegister $register */
        $register = $this->app->make(Register::class);

        $user = $register->registerUser($request);

        if ($user instanceof User) {
            $user->assign($request->getRoles());

            return $user;
        }

        return $this->response_factory->createErrorMessage(BadMessages::REGISTER_USER_ERROR, $request);
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

    public function update(IUpdateUserRequest $data_provider, int $user_id): \UseCases\Contracts\User\Entities\IUser
    {
        /* @var IUpdateUser $update_users */
        $update_users = $this->app->make(UpdateUser::class);

        return $update_users->update($data_provider, $user_id);
    }
}


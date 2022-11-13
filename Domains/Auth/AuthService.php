<?php

declare(strict_types=1);

namespace Auth;

use App\Models\User;
use Auth\Contracts\IForgot;
use App\Models\ResponseMessages;
use App\Models\Other\BadMessages;
use UseCases\Contracts\Auth\IAuth;
use Auth\Contracts\IChangePassword;
use Illuminate\Foundation\Application;
use User\Entities\UserResponseFactory;
use UseCases\Contracts\ResponseObjects\IError;
use UseCases\Contracts\Requests\Auth\ILoginRequest;
use UseCases\Contracts\Requests\Auth\IChangeRequest;
use UseCases\Contracts\Requests\Auth\IForgotRequest;

class AuthService implements IAuth
{
    /**
     * @var Application
     */
    private Application $app;
    /**
     * @var UserResponseFactory
     */
    private UserResponseFactory $response_factory;

    private LoggedDevice $device;

    /**
     * @param Application $app
     * @param UserResponseFactory $response_factory
     * @param LoggedDevice $device
     */
    public function __construct(Application $app, UserResponseFactory $response_factory, LoggedDevice $device)
    {
        $this->app = $app;
        $this->response_factory = $response_factory;
        $this->device = $device;
    }

    public function login(ILoginRequest $request): IError|User
    {
        $login = $this->app->make(Login::class);
        $user = $login->loginUser($request);
        $name_device = $this->device->getDevice();
        $is_mobile = $this->device->isMobile();

        if ($user instanceof User) {
            $token = $user->createToken($name_device, $is_mobile)->plainTextToken;
            $user->forceFill([
                'token' => $token,
            ]);

            return $user;
        }

        return $this->response_factory->createErrorMessage(
            BadMessages::INVALID_USER_CREDENTIALS,
            $request
        );
    }

    public function forgot(IForgotRequest $request)
    {
        /* @var IForgot $forgot */
        $forgot = $this->app->make(Forgot::class);

        return $forgot->forgot($request);
    }

    public function changePassword(IChangeRequest $request, User $user)
    {
        /* @var IChangePassword $change */
        $change = $this->app->make(ChangePassword::class);

        $user->tokens()->delete();
        $change->changePassword($request, $user);

        return $this->response_factory->createSuccessMessage(ResponseMessages::CHANGED_PASSWORD);
    }
}

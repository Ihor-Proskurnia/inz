<?php

declare(strict_types=1);

namespace Auth;

use Auth\Contracts\ILogin;
use Auth\Entities\Models\User;
use App\Models\Other\BadMessages;
use User\Entities\UserResponseFactory;
use UseCases\Contracts\Requests\Auth\ILoginRequest;

class Login implements ILogin
{
    private User $user_model;

    private LoggedDevice $device;

    private UserResponseFactory $response_factory;

    private UserVerification $user_verification;

    public function __construct(User $user_model, LoggedDevice $device, UserResponseFactory $response_factory, UserVerification $user_verification)
    {
        $this->user_model = $user_model;
        $this->device = $device;
        $this->response_factory = $response_factory;
        $this->user_verification = $user_verification;
    }

    public function loginUser(ILoginRequest $request)
    {
        $user = $this->user_model->where('email', $request->get('email'))->first();

        if (!$this->isValid($user, $request)) {
            return $this->response_factory->createSimpleErrorMessage(BadMessages::LOGIN_USER_ERROR);
        }

        $this->oldTokensRemove($user);

        return $user;
    }

    private function isValid(?User $user, ILoginRequest $request): bool
    {
        return !is_null($user) && $this->user_verification->emailVerify($user) &&
            $this->user_verification->checkPassword($user, $request);
    }

    /**
     * @param $user
     *
     * @return void
     */
    protected function oldTokensRemove($user): void
    {
        // now we delete only web tokens, mobile not removed

//        if ($this->device->isMobile()) {
//            $user->tokens()->delete();
//        }
        $user->notMobileTokens()->delete();
    }
}

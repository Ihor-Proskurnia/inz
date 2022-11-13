<?php

declare(strict_types=1);

namespace UseCases\Contracts\Auth;

use App\Models\User;
use UseCases\Contracts\Requests\Auth\ILoginRequest;
use UseCases\Contracts\Requests\Auth\IChangeRequest;
use UseCases\Contracts\Requests\Auth\IForgotRequest;

interface IAuth
{
    public function login(ILoginRequest $request);
    public function forgot(IForgotRequest $request);
    public function changePassword(IChangeRequest $request, User $user);
}

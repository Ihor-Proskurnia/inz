<?php

declare(strict_types=1);

namespace Auth\Contracts;

use Auth\Entities\Models\User;
use UseCases\Contracts\Requests\Auth\ILoginRequest;

interface IUserVerification
{
    public function emailVerify(User $user): bool;
    public function checkPassword(User $user, ILoginRequest $request): bool;
}

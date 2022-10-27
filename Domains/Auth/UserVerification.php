<?php

declare(strict_types=1);

namespace Auth;

use Auth\Entities\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth\Contracts\IUserVerification;
use UseCases\Contracts\Requests\Auth\ILoginRequest;

class UserVerification implements IUserVerification
{
    private Hash $hash;

    public function __construct(Hash $hash)
    {
        $this->hash = $hash;
    }

    public function emailVerify(User $user): bool
    {
        if (!$user->hasVerifiedEmail()) {
            return false;
        }

        return true;
    }

    public function checkPassword(User $user, ILoginRequest $request): bool
    {
        if (!$this->hash::check($request->getUserPassword(), $user->password)) {
            return false;
        }

        return true;
    }
}

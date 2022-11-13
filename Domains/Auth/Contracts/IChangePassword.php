<?php

declare(strict_types=1);

namespace Auth\Contracts;

use App\Models\User;
use UseCases\Contracts\Requests\Auth\IChangeRequest;

interface IChangePassword
{
    public function changePassword(IChangeRequest $request, User $user);
}

<?php

declare(strict_types=1);

namespace User\Contracts;

use UseCases\Contracts\Requests\Auth\IRegisterUser;

interface IRegister
{
    public function registerUser(IRegisterUser $request);
}

<?php

declare(strict_types=1);

namespace Auth\Contracts;

use UseCases\Contracts\Requests\Auth\ILoginRequest;

interface ILogin
{
    public function loginUser(ILoginRequest $request);
}

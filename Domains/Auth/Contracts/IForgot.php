<?php

declare(strict_types=1);

namespace Auth\Contracts;

use UseCases\Contracts\Requests\Auth\IForgotRequest;

interface IForgot
{
    public function forgot(IForgotRequest $request);
}

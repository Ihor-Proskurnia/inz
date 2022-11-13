<?php

declare(strict_types=1);

namespace UseCases\Contracts\Requests\Auth;

interface IForgotRequest
{
    public function getEmail();
}

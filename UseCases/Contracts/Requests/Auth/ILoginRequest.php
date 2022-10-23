<?php

declare(strict_types=1);

namespace UseCases\Contracts\Requests\Auth;

interface ILoginRequest
{
    public function getEmail();
    public function getUserPassword();
}

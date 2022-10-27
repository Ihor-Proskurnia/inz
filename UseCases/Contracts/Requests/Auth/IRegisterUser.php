<?php

declare(strict_types=1);

namespace UseCases\Contracts\Requests\Auth;

interface IRegisterUser
{
    public function getUserPassword();

    public function getUsername();

    public function getUserSurname();

    public function getEmail();

    public function getRoles();
}

<?php

declare(strict_types=1);

namespace UseCases\Contracts\Requests\User;

interface IUpdateUserRequest
{
    public function getUsername();

    public function getPhone();

    public function getCity();
}

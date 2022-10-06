<?php

namespace UseCases\Contracts\User\Entities;

use Illuminate\Support\Collection;

interface IUser
{
    public function getId(): int;

    public function getName(): string;

    public function getEmail(): string;
}
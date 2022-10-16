<?php

namespace UseCases\Contracts\User\Entities;

interface IUser
{
    public function getId(): int;

    public function getName(): string;

    public function getEmail(): string;
}

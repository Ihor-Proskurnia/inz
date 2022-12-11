<?php

namespace UseCases\Contracts\User\Entities;

use Illuminate\Support\Collection;

interface IUser
{
    public function getId(): int;

    public function getName(): string;

    public function getEmail(): string;

    public function getDescription(): ?string;

    public function getPhone(): ?string;

    public function getCity(): ?string;

    public function showRoles(): Collection;
}

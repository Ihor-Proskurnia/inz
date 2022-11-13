<?php

namespace UseCases\Contracts\User;

use Illuminate\Support\Collection;

interface IUserDriver
{
    public function getDrivers(): Collection;
}

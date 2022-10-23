<?php

namespace Auth\Contracts;

interface ILoggedDevice
{
    public function getDevice(): string;
    public function isMobile(): bool;
}

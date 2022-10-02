<?php

declare(strict_types=1);

namespace UseCases\Contracts\User;

interface IUsersListRequest
{
    public function getPerPage(): int;

    public function getPage(): int;
}

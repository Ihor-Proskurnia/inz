<?php

declare(strict_types=1);

namespace UseCases\Contracts\Category;

interface ICategoryListRequest
{
    public function getPerPage(): int;

    public function getPage(): int;
}

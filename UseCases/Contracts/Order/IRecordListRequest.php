<?php

declare(strict_types=1);

namespace UseCases\Contracts\Order;

interface IRecordListRequest
{
    public function getPerPage(): int;

    public function getPage(): int;
}

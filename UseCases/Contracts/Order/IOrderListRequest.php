<?php

declare(strict_types=1);

namespace UseCases\Contracts\Order;

interface IOrderListRequest
{
    public function getPerPage(): int;

    public function getPage(): int;
}

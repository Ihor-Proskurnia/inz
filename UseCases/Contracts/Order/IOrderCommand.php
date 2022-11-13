<?php

declare(strict_types=1);

namespace UseCases\Contracts\Order;

use UseCases\Contracts\Order\Entities\IOrder;
use UseCases\Contracts\ResponseObjects\IError;

interface IOrderCommand
{
    public function createOrder(int $trainer_id, ICreateOrderRequest $data_provider): IOrder;
}

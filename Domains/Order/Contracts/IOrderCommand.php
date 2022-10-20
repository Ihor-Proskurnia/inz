<?php

declare(strict_types=1);

namespace Order\Contracts;

use UseCases\Contracts\Order\IOrderListRequest;

interface IOrderCommand
{
    public function showByCategory(int $category_id, IOrderListRequest $query_param);
    public function showByTrainer(int $trainer_id, IOrderListRequest $query_param);
}

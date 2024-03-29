<?php

declare(strict_types=1);

namespace Order\Contracts;

use UseCases\Contracts\Order\IOrderListRequest;

interface IOrderQuery
{
    public function showByCategory(int $category_id, IOrderListRequest $query_param);
    public function showByTrainer(int $trainer_id, IOrderListRequest $query_param);
    public function showAll(IOrderListRequest $query_param);
}

<?php

declare(strict_types=1);

namespace UseCases\Contracts\Order;

use Illuminate\Pagination\LengthAwarePaginator;

interface IOrderService
{
    public function showByCategory(int $category_id, IOrderListRequest $query_param): LengthAwarePaginator;
    public function showByTrainer(int $trainer_id, IOrderListRequest $query_param): LengthAwarePaginator;
    public function showAll(IOrderListRequest $query_param): LengthAwarePaginator;
}

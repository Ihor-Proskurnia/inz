<?php

declare(strict_types=1);

namespace Order;

use Category\Contracts\ICategoryCommand;
use Order\Contracts\IOrderCommand;
use UseCases\Contracts\Category\ICategoryListRequest;
use UseCases\Contracts\Category\ICategoryService;
use Illuminate\Foundation\Application;
use Illuminate\Pagination\LengthAwarePaginator;
use UseCases\Contracts\Order\IOrderListRequest;
use UseCases\Contracts\Order\IOrderService;

class OrderService implements IOrderService
{
    /**
     * @var Application
     */
    public Application $app;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }


    public function showByCategory(int $category_id, IOrderListRequest $query_param): LengthAwarePaginator
    {
        /* @var IOrderCommand $show_orders */
        $show_orders = $this->app->make(OrderCommand::class);

        return $show_orders->showByCategory($category_id, $query_param);
    }

    public function showByTrainer(int $trainer_id, IOrderListRequest $query_param): LengthAwarePaginator
    {
        /* @var IOrderCommand $show_orders */
        $show_orders = $this->app->make(OrderCommand::class);

        return $show_orders->showByTrainer($trainer_id, $query_param);
    }
}

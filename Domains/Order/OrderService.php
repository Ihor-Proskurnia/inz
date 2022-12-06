<?php

declare(strict_types=1);

namespace Order;

use Order\Contracts\IOrderQuery;
use Illuminate\Foundation\Application;
use Illuminate\Pagination\LengthAwarePaginator;
use Order\Entities\Order;
use UseCases\Contracts\Order\IOrderListRequest;
use UseCases\Contracts\Order\IOrderService;

class OrderService implements IOrderService
{
    /**
     * @var Application
     */
    public Application $app;

    private Order $order;

    /**
     * @param Application $app
     */
    public function __construct(Application $app, Order $order)
    {
        $this->app = $app;
        $this->order = $order;
    }


    public function showByCategory(int $category_id, IOrderListRequest $query_param): LengthAwarePaginator
    {
        /* @var IOrderQuery $show_orders */
        $show_orders = $this->app->make(OrderQuery::class);

        return $show_orders->showByCategory($category_id, $query_param);
    }

    public function showByTrainer(int $trainer_id, IOrderListRequest $query_param): LengthAwarePaginator
    {
        /* @var IOrderQuery $show_orders */
        $show_orders = $this->app->make(OrderQuery::class);

        return $show_orders->showByTrainer($trainer_id, $query_param);
    }

    public function delete(int $order_id)
    {
        return $this->order->newQuery()->where('id', $order_id)->delete();
    }

    public function showAll(IOrderListRequest $query_param): LengthAwarePaginator
    {
        /* @var IOrderQuery $show_orders */
        $show_orders = $this->app->make(OrderQuery::class);

        return $show_orders->showAll($query_param);
    }
}

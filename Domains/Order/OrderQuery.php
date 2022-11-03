<?php

declare(strict_types=1);

namespace Order;

use Category\Entities\Category;
use Order\Contracts\IOrderQuery;
use Illuminate\Foundation\Application;
use Order\Entities\Order;
use Order\Filters\OrderFilter;
use UseCases\Contracts\Order\IOrderListRequest;

class OrderQuery implements IOrderQuery
{
    /**
     * @var Application
     */
    public Application $app;
    /**
     * @var Order
     */
    public Order $order;

    /**
     * @param Application $app
     * @param Category $order
     */
    public function __construct(Application $app, Order $order)
    {
        $this->app = $app;
        $this->order = $order;
    }


    public function showByCategory(int $category_id, IOrderListRequest $query_param)
    {
        $data = $query_param->validated();

        $filter = $this->app->make(OrderFilter::class, ['queryParams' => array_filter($data)]);

        $query = $this->order->where('category_id', $category_id)->filter($filter);

        return $query->paginate($query_param->getPerPage());
    }

    public function showByTrainer(int $trainer_id, IOrderListRequest $query_param)
    {
        $data = $query_param->validated();

        $filter = $this->app->make(OrderFilter::class, ['queryParams' => array_filter($data)]);

        $query = $this->order->where('user_id', $trainer_id)->filter($filter);

        return $query->paginate($query_param->getPerPage());
    }
}

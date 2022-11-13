<?php

namespace Order;


use Order\Entities\Order;
use UseCases\Contracts\Order\Entities\IOrder;
use UseCases\Contracts\Order\ICreateOrderRequest;
use UseCases\Contracts\Order\IOrderCommand;

class OrderCommand implements IOrderCommand
{
    private Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function createOrder(int $trainer_id, ICreateOrderRequest $data_provider): IOrder
    {
        /** @var Order $order */
        $order = $this->order->newQuery()->create([
            'category_id' => $data_provider->getCategoryId(),
            'user_id' => $trainer_id,
            'date' => $data_provider->getDate(),
            'from_time' => $data_provider->getFromTime(),
            'to_time' => $data_provider->getToTime(),
            'name' => $data_provider->getName(),
            'description' => $data_provider->getDescription(),
        ]);

        return $order;
    }
}

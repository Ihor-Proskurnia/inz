<?php

declare(strict_types=1);

namespace UseCases\Order;

use App\Models\Category;
use App\Models\User;
use Order\Contracts\IOrderQuery;
use UseCases\Contracts\Order\ICreateOrderRequest;
use UseCases\Contracts\Order\IOrderCommand;
use UseCases\Contracts\Order\IOrderListRequest;
use UseCases\Contracts\Order\IOrderService;
use UseCases\Contracts\ResponseObjects\IError;
use UseCases\Contracts\ResponseObjects\ISuccess;
use UseCases\DomainServiceFactory;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderCase
{
    private DomainServiceFactory $domain_service_factory;

    /**
     * @param DomainServiceFactory $domain_service_factory
     */
    public function __construct(DomainServiceFactory $domain_service_factory)
    {
        $this->domain_service_factory = $domain_service_factory;
    }

    public function showByCategory(int $category_id, IOrderListRequest $request): LengthAwarePaginator
    {
        /** @var IOrderService $order_service */
        $order_service = $this->domain_service_factory->create(IOrderService::class);

        return $order_service->showByCategory($category_id, $request);
    }

    public function showByTrainer(int $trainer_id, IOrderListRequest $request): LengthAwarePaginator
    {
        /** @var IOrderService $order_service */
        $order_service = $this->domain_service_factory->create(IOrderService::class);

        return $order_service->showByTrainer($trainer_id, $request);
    }

    public function delete(int $order_id, int $user_id)
    {
        /** @var IOrderService $order_service */
        $order_service = $this->domain_service_factory->create(IOrderService::class);

        return $order_service->delete($order_id, $user_id);
    }

    public function createOrder(int $trainer_id, ICreateOrderRequest $data_provider)
    {
        /** @var IOrderCommand $order_command */
        $order_command = $this->domain_service_factory->create(IOrderCommand::class);
        $order = $order_command->createOrder($trainer_id, $data_provider);

        return $order;
    }

    public function showAll(IOrderListRequest $request): LengthAwarePaginator
    {
        /** @var IOrderService $order_service */
        $order_service = $this->domain_service_factory->create(IOrderService::class);

        return $order_service->showAll($request);
    }
}

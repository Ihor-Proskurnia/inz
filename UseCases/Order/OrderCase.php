<?php

declare(strict_types=1);

namespace UseCases\Order;

use App\Models\Category;
use App\Models\User;
use UseCases\Contracts\Order\IOrderListRequest;
use UseCases\Contracts\Order\IOrderService;
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
}

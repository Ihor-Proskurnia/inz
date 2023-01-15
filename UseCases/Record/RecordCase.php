<?php

declare(strict_types=1);

namespace UseCases\Record;

use App\Http\Requests\Order\RecordListRequest;
use App\Models\Category;
use App\Models\User;
use Order\Contracts\IOrderQuery;
use UseCases\Contracts\Order\ICreateOrderRequest;
use UseCases\Contracts\Order\IOrderCommand;
use UseCases\Contracts\Order\IOrderListRequest;
use UseCases\Contracts\Order\IOrderService;
use UseCases\Contracts\Order\IRecordListRequest;
use UseCases\Contracts\Record\IRecordCommand;
use UseCases\Contracts\ResponseObjects\IError;
use UseCases\DomainServiceFactory;
use Illuminate\Pagination\LengthAwarePaginator;

class RecordCase
{
    private DomainServiceFactory $domain_service_factory;

    /**
     * @param DomainServiceFactory $domain_service_factory
     */
    public function __construct(DomainServiceFactory $domain_service_factory)
    {
        $this->domain_service_factory = $domain_service_factory;
    }

    public function createRecord(int $order_id, int $user_id)
    {
        /** @var IRecordCommand $record_command */
        $record_command = $this->domain_service_factory->create(IRecordCommand::class);
        $record = $record_command->createRecord($order_id, $user_id);

        return $record;
    }

    public function showByUser(int $user_id, IRecordListRequest $request): LengthAwarePaginator
    {
        /** @var IRecordCommand $record_command */
        $record_command = $this->domain_service_factory->create(IRecordCommand::class);

        return $record_command->showByUser($user_id, $request);
    }

    public function delete(int $record_id)
    {
        /** @var IRecordCommand $record_command */
        $record_command = $this->domain_service_factory->create(IRecordCommand::class);

        return $record_command->delete($record_id);
    }
}

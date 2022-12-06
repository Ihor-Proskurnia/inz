<?php

declare(strict_types=1);

namespace UseCases\Contracts\Record;

use Illuminate\Pagination\LengthAwarePaginator;
use UseCases\Contracts\Order\Entities\IOrder;
use UseCases\Contracts\Order\Entities\IRecord;
use UseCases\Contracts\Order\IRecordListRequest;
use UseCases\Contracts\ResponseObjects\IError;

interface IRecordCommand
{
    public function createRecord(int $order_id, int $user_id): IRecord;
    public function showByUser(int $user_id, IRecordListRequest $request): LengthAwarePaginator;
}

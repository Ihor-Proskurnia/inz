<?php

declare(strict_types=1);

namespace UseCases\Contracts\Record;

use UseCases\Contracts\Order\Entities\IOrder;
use UseCases\Contracts\Order\Entities\IRecord;
use UseCases\Contracts\ResponseObjects\IError;

interface IRecordCommand
{
    public function createRecord(int $order_id, int $user_id): IRecord;
}

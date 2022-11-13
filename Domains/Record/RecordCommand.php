<?php

namespace Record;

use Record\Entities\Record;
use UseCases\Contracts\Order\Entities\IRecord;
use UseCases\Contracts\Record\IRecordCommand;

class RecordCommand implements IRecordCommand
{
    private Record $record;

    public function __construct(Record $record)
    {
        $this->record = $record;
    }

    public function createRecord(int $order_id, int $user_id): IRecord
    {
        /** @var Record $record */
        $record = $this->record->newQuery()->create([
            'order_id' => $order_id,
            'user_id' => $user_id,
        ]);

        return $record;
    }
}

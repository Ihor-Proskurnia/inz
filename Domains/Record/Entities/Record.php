<?php

namespace Record\Entities;

use App\Models\Record as BaseModel;
use App\Traits\DomainMorphMap;
use UseCases\Contracts\Order\Entities\IRecord;

class Record extends BaseModel implements IRecord
{
    use DomainMorphMap;

    public function getId(): int
    {
        return $this->id;
    }

    public function getOrderId()
    {
        return $this->order_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }
}

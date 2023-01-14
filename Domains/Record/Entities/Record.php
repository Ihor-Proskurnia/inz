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

    public function getFromTime(): string
    {
        return $this->from_time;
    }

    public function getToTime(): string
    {
        return $this->to_time;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getTrainer()
    {
        return $this->trainer_id;
    }
}

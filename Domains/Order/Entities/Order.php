<?php

namespace Order\Entities;

use App\Models\Order as BaseModel;
use App\Traits\DomainMorphMap;
use UseCases\Contracts\Order\Entities\IOrder;
use UseCases\Contracts\Order\Entities\IRecord;

class Order extends BaseModel implements IOrder
{
    use DomainMorphMap;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    public function getTrainer()
    {
        return $this->trainer;
    }

    public function getTrainerId(): int
    {
        return $this->user_id;
    }

    public function getDate(): string
    {
        return $this->date;
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

    public function getSportsman()
    {
        return $this->sportsman_id;
    }

    public function checkHasRecord(): bool
    {
        return (bool) $this->record()->exists();
    }
}

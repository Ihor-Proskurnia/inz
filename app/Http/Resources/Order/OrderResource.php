<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;
use UseCases\Contracts\Order\Entities\IOrder;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        /** @var IOrder $this */
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'date' => $this->getDate(),
            'from_date' => $this->getFromTime(),
            'to_time' => $this->getToTime(),
            'reserved' => $this->checkHasRecord(),
        ];
    }
}

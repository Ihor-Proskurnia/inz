<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;
use UseCases\Contracts\Order\Entities\IOrder;
use UseCases\Contracts\Order\Entities\IRecord;

class RecordResource extends JsonResource
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
        /** @var IRecord $this */
        return [
            'id' => $this->getId(),
            'order_id' => $this->getOrderId(),
            'user_id' => $this->getUserId(),
        ];
    }
}

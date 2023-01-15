<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Product\DeliveryResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use UseCases\Contracts\Category\Entities\ICategory;
use UseCases\Contracts\Order\Entities\IOrder;

class OrdersCollectionResource extends ResourceCollection
{
    /**
     * UsersCollectionResource constructor.
     * Enable wrap for this resource
     *
     * @param $resource
     */
    public function __construct($resource)
    {
        parent::__construct($resource);
        static::wrap('data');
    }

    public $collects = OrderResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Support\Collection
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($item, $key) {
            /** @var IOrder $item */
            return [
                'id' => $item->getId(),
                'name' => $item->getName(),
                'trainer_name' => $item->getTrainerName(),
                'description' => $item->getDescription(),
                'date' => $item->getDate(),
                'from_date' => $item->getFromTime(),
                'to_time' => $item->getToTime(),
                'reserved' => $item->checkHasRecord(),
                'sportsman_id' => $item->getSportsman(),
            ];
        });
    }
}

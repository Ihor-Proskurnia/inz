<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\ResourceCollection;
use UseCases\Contracts\Category\Entities\ICategory;
use UseCases\Contracts\Order\Entities\IOrder;
use UseCases\Contracts\Order\Entities\IRecord;

class RecordsCollectionResource extends ResourceCollection
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

    public $collects = RecordResource::class;

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
            /** @var IRecord $item */
            return [
                'name' => $item->getName(),
                'description' => $item->getDescription(),
                'date' => $item->getDate(),
                'from_time' => $item->getFromTime(),
                'to_time' => $item->getToTime(),
            ];
        });
    }
}

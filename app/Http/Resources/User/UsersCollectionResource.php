<?php

declare(strict_types=1);

namespace App\Http\Resources\User;

use UseCases\Contracts\User\Entities\IUser;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UsersCollectionResource extends ResourceCollection
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

    public $collects = UserResource::class;

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
            /** @var IUser $item */
            return [

                'id' => $item->getId(),
                'name' => $item->getName(),
                'email' => $item->getEmail(),
            ];
        });
    }
}

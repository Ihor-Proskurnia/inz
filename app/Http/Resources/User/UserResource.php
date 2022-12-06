<?php

declare(strict_types=1);

namespace App\Http\Resources\User;

use UseCases\Contracts\User\Entities\IUser;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
        /** @var IUser $this */
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'phone' => $this->getPhone(),
            'city' => $this->getCity(),
            'roles' => $this->showRoles(),
        ];
    }
}

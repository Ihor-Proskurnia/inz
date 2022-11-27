<?php

namespace User\Entities;

use App\Models\Traits\Filterable;
use App\Models\User as ModelUser;
use App\Traits\DomainMorphMap;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use UseCases\Contracts\User\Entities\IUser;

/**
 * @method static Builder getUser(int $user_id)
 */
class User extends ModelUser implements IUser
{
    use DomainMorphMap;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function showRoles(): Collection
    {
        return $this->getRoles();
    }

    public function scopeGetUser(Builder $query, int $user_id)
    {
        return $query->where('id', $user_id)->first();
    }
}

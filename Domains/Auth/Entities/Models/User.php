<?php

namespace Auth\Entities\Models;

use App\Traits\DomainMorphMap;
use App\Models\User as BaseUser;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method static Builder notMobile()
 */
class User extends BaseUser
{
    use DomainMorphMap;

    public function scopeNotMobile(): Builder
    {
        return $this->where('is_mobile', false);
    }
}

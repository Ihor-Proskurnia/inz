<?php

declare(strict_types=1);

namespace App\Models\Traits;

use App\Contracts\IFilter;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     * @param Builder $builder
     * @param IFilter $filter
     *
     * @return Builder
     */
    public function scopeFilter(Builder $builder, IFilter $filter): Builder
    {
        $filter->apply($builder);

        return $builder;
    }
}

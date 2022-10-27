<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface IFilter
{
    public function apply(Builder $builder);
}

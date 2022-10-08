<?php

declare(strict_types=1);

namespace Category\Filters;

use App\Http\Filter\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class CategoryFilter extends AbstractFilter
{
    public const NAME = 'name';


    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
        ];
    }

    public function name(Builder $builder, $value): void
    {
        $builder->where('name', 'like', "%$value%");
    }
}

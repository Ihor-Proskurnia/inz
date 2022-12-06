<?php

declare(strict_types=1);

namespace Order\Filters;

use App\Http\Filter\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class RecordFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const FROM_DATE ='from_date';
    public const TO_DATE = 'to_date';


    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::FROM_DATE  => [$this, 'fromDate'],
            self::TO_DATE => [$this, 'toDate'],
        ];
    }

    public function name(Builder $builder, $value): void
    {
        $builder->where('name', 'like', "%$value%");
    }

    public function fromDate(Builder $builder, $value): void
    {
        $builder->whereDate('date', '>=', $value);
    }

    public function toDate(Builder $builder, $value): void
    {
        $builder->whereDate('date', '<=', $value);
    }
}

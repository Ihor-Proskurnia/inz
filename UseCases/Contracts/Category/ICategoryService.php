<?php

declare(strict_types=1);

namespace UseCases\Contracts\Category;

use Illuminate\Pagination\LengthAwarePaginator;

interface ICategoryService
{
    public function showCategories( ICategoryListRequest $query_param): LengthAwarePaginator;
}

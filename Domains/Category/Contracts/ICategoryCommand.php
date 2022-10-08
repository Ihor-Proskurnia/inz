<?php

declare(strict_types=1);

namespace Category\Contracts;

use UseCases\Contracts\Category\ICategoryListRequest;

interface ICategoryCommand
{
    public function showCategories( ICategoryListRequest $query_param);
}

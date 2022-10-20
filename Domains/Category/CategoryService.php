<?php

declare(strict_types=1);

namespace Category;

use Category\Contracts\ICategoryCommand;
use UseCases\Contracts\Category\ICategoryListRequest;
use UseCases\Contracts\Category\ICategoryService;
use Illuminate\Foundation\Application;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryService implements ICategoryService
{
    /**
     * @var Application
     */
    public Application $app;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }


    public function showCategories( ICategoryListRequest $query_param): LengthAwarePaginator
    {
        /* @var ICategoryCommand $show_categories */
        $show_categories = $this->app->make(CategoryCommand::class);

        return $show_categories->showCategories($query_param);
    }
}

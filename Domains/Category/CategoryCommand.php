<?php

declare(strict_types=1);

namespace Category;

use Category\Contracts\ICategoryCommand;
use Category\Entities\Category;
use Category\Filters\CategoryFilter;
use UseCases\Contracts\Category\Entities\ICategory;
use Illuminate\Foundation\Application;
use UseCases\Contracts\Category\ICategoryListRequest;

class CategoryCommand implements ICategoryCommand
{
    /**
     * @var Application
     */
    public Application $app;
    /**
     * @var Category
     */
    public Category $category;

    /**
     * @param Application $app
     * @param Category $category
     */
    public function __construct(Application $app, Category $category)
    {
        $this->app = $app;
        $this->category = $category;
    }


    public function showCategories(ICategoryListRequest $query_param)
    {
        $data = $query_param->validated();

        $filter = $this->app->make(CategoryFilter::class, ['queryParams' => array_filter($data)]);

        $query = $this->category->filter($filter);

        return $query->paginate($query_param->getPerPage());
    }
}

<?php

declare(strict_types=1);

namespace Category;

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
    public Category $Category;

    /**
     * @param Application $app
     * @param Category $Category
     */
    public function __construct(Application $app, Category $Category)
    {
        $this->app = $app;
        $this->Category = $Category;
    }


    public function showCategories(ICategoryListRequest $query_param)
    {
        $data = $query_param->validated();

        $filter = $this->app->make(CategoryFilter::class, ['queryParams' => array_filter($data)]);

        $query = $this->Category->filter($filter);

        return $query->paginate($query_param->getPerPage());
    }
}

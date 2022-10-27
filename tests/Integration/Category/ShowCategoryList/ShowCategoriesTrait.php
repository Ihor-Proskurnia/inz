<?php

namespace Tests\Integration\Category\ShowCategoryList;

use App\Http\Requests\Category\CategoriesListRequest;
use function app;

trait ShowCategoriesTrait
{
    public function createRequest(array $data): CategoriesListRequest
    {
        $request = new CategoriesListRequest($data);
        $request
            ->setContainer(app())
            ->validateResolved();

        return $request;
    }
}

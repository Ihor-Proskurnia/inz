<?php

declare(strict_types=1);

namespace App\Http\Controllers\Category;

use App\Http\Requests\Category\CategoriesListRequest;
use App\Http\Resources\Category\CategoriesCollectionResource;
use App\Models\Category;
use UseCases\Category\CategoryCase;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function showCategories(CategoriesListRequest $request, CategoryCase $use_case)
    {
        $response = $use_case->showCategories($request);
        $resource = new CategoriesCollectionResource($response);

        return $resource->response()->setStatusCode(Response::HTTP_OK);
    }

//    public function showCategory(Category $category, CategoryCase $use_case)
//    {
//        $response = $use_case->showCategory($category);
//        $resource = new CategoryResource($response);
//
//        return $resource->response()->setStatusCode(Response::HTTP_OK);
//    }
}

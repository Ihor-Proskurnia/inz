<?php

namespace Tests\Integration\Category\ShowCategoryList;

use App\Models\Category;
use Tests\TestCase;
use App\Models\User;
use UseCases\Category\CategoryCase;
use UseCases\User\UserCase;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowCategoriesTest extends TestCase
{
    use RefreshDatabase;
    use ShowCategoriesTrait;

    /**
     * @feature Category
     * @scenario Show category list
     * @case Successfully show category list
     *
     * @test
     */
    public function showCategories_success_checkResponse()
    {
        // GIVEN
        $this->createUserAndBe();
        $this->createCategory();
        $request = $this->createRequest([]);
        $tested_use_case = $this->app->make(CategoryCase::class);

        // WHEN
        $response = $tested_use_case->showCategories($request);

        // THEN
        $this->assertInstanceOf(LengthAwarePaginator::class, $response);
        $this->assertEquals(1, $response->count());
        $this->assertInstanceOf(Category::class, $response->first());
    }

    /**
     * @feature Category
     * @scenario Show category list
     * @case Successfully show category list, search by name
     *
     * @test
     */
    public function showCategories_success_searchByName()
    {
        // GIVEN
        $this->createUserAndBe();
        $this->createCategory('Test');
        $this->createCategory();
        $request = $this->createRequest(['name' => 'Tes']);
        $tested_use_case = $this->app->make(CategoryCase::class);

        // WHEN
        $response = $tested_use_case->showCategories($request);

        // THEN
        $this->assertInstanceOf(LengthAwarePaginator::class, $response);
        $this->assertEquals(1, $response->count());
        $this->assertInstanceOf(Category::class, $response->first());
    }
}

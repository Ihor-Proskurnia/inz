<?php

namespace Tests\Smoke\Controllers\Category\ShowCategories;

use function route;
use Tests\TestCase;
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
    public function showCategories_goodRoles_responseOk()
    {
        // GIVEN
        $this->createUserAndBe('email@email.com');
        $this->createCategory();

        // WHEN
        $response = $this->json('get', route('categories.show'));

        // THEN
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @feature Category
     * @scenario Show category list
     * @case Successfully show category list
     *
     * @test
     */
    public function showCategories_goodRoles_checkJson()
    {
        // GIVEN
        $this->createUserAndBe('email@email.com');

        // WHEN
        $response = $this->json('get', route('categories.show'));

        // THEN
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'description',
                    'excerpt',
                ],
            ],
        ]);
    }

    /**
     * @feature Category
     * @scenario Show category list
     * @case Failed show categories, not logged
     *
     * @test
     */
    public function showCategories_notLogged_responseUnauthorized()
    {
        // GIVEN
        $this->createUser();

        // WHEN
        $response = $this->json('get', route('categories.show'));

        // THEN
        $response->assertUnauthorized();
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }
}

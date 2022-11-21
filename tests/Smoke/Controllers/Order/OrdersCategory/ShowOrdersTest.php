<?php

namespace Tests\Smoke\Controllers\Order\OrdersCategory;

use App\Models\Other\RoleType;
use function route;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowOrdersTest extends TestCase
{
    use RefreshDatabase;
    use ShowOrdersTrait;

    /**
     * @feature Order
     * @scenario Show order list by category
     * @case Successfully show order list
     *
     * @test
     */
    public function showOrders_byCategory_responseOk()
    {
        // GIVEN
        $this->createUserAndBe('email@email.com');
        $category = $this->createCategory();
        $trainer = $this->createUser(RoleType::TRAINER);
        $this->createOrder($category, $trainer);

        // WHEN
        $response = $this->json('get', route('orders.show.category', ['category_id' => $category->id]));

        // THEN
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @feature Order
     * @scenario Show order list by category
     * @case Successfully show order list
     *
     * @test
     */
    public function showOrders_goodRoles_checkJson()
    {
        // GIVEN
        $this->createUserAndBe('email@email.com');
        $category = $this->createCategory();
        $trainer = $this->createUser(RoleType::TRAINER);
        $this->createOrder($category, $trainer);

        // WHEN
        $response = $this->json('get', route('orders.show.category', ['category_id' => $category->id]));

        // THEN
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'description',
                    'date',
                    'from_date',
                    'to_time',
                    'reserved'
                ],
            ],
        ]);
    }

    /**
     * @feature Order
     * @scenario Show order list by category
     * @case Failed show orders, not logged
     *
     * @test
     */
    public function showOrders_notLogged_responseUnauthorized()
    {
        // GIVEN
        $category = $this->createCategory();
        $trainer = $this->createUser(RoleType::TRAINER);
        $this->createOrder($category, $trainer);

        // WHEN
        $response = $this->json('get', route('orders.show.category', ['category_id' => $category->id]));

        // THEN
        $response->assertUnauthorized();
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }
}

<?php

namespace Tests\Smoke\Controllers\Order\AddOrder;

use App\Models\Order;
use function route;
use Tests\TestCase;
use App\Models\Other\RoleType;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddOrderTest extends TestCase
{
    use RefreshDatabase;
    use AddOrderTrait;

    /**
     * @feature Order
     * @scenario Create order
     * @case Successfully create order
     *
     * @test
     */
    public function createOrder_responseCreated()
    {
        // GIVEN
        $this->createUserAndBe();
        $trainer = $this->createUser(RoleType::TRAINER);
        $this->createCategory();
        $credentials = $this->createOrderCredentials();

        // WHEN
        $response = $this->json('post', route('orders.add', ['trainer_id' => $trainer->id]), $credentials);

        // THEN
        $response->assertCreated();
    }

    /**
     * @feature Order
     * @scenario Create order
     * @case Successfully create order
     *
     * @test
     */
    public function createOrder_responseCreated_checkDB()
    {
        // GIVEN
        $this->createUserAndBe();
        $trainer = $this->createUser(RoleType::TRAINER);
        $this->createCategory();
        $credentials = $this->createOrderCredentials();

        // WHEN
        $response = $this->json('post', route('orders.add', ['trainer_id' => $trainer->id]), $credentials);

        // THEN
        $response->assertCreated();
        $this->assertDatabaseCount('orders', 1);
    }
}

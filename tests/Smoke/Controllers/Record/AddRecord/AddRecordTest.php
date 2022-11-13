<?php

namespace Tests\Smoke\Controllers\Record\AddRecord;

use App\Models\Order;
use function route;
use Tests\TestCase;
use App\Models\Other\RoleType;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddRecordTest extends TestCase
{
    use RefreshDatabase;
    use AddRecordTrait;

    /**
     * @feature Record
     * @scenario Create Record
     * @case Successfully create record
     *
     * @test
     */
    public function createOrder_responseCreated()
    {
        // GIVEN
        $this->createUserAndBe("test@mail.com",RoleType::SPORTSMAN);
        $trainer = $this->createUser("trainer@mail.com",RoleType::TRAINER);
        $category = $this->createCategory();
        $order = $this->createOrder($category, $trainer);

        // WHEN
        $response = $this->json('post', route('add.record', ['order_id' => $order->id]));

        // THEN
        $response->assertCreated();
        $this->assertDatabaseCount('records', 1);
    }
}

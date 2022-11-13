<?php

namespace Tests\Integration\Order\ShowOrderList;

use App\Models\Order;
use App\Models\Other\RoleType;
use Illuminate\Support\Carbon;
use Tests\TestCase;
use UseCases\Order\OrderCase;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowOrdersTest extends TestCase
{
    use RefreshDatabase;
    use ShowOrdersTrait;

    /**
     * @feature Order
     * @scenario Show order list by category
     * @case Successfully show order list with params
     *
     * @test
     */
    public function showOrders_success_withDateFromTo()
    {
        // GIVEN
        $this->createUserAndBe('email@email.com');
        $category = $this->createCategory();
        $trainer = $this->createUser(RoleType::TRAINER);
        $this->createOrder($category, $trainer, Carbon::now());
        $this->createOrder($category, $trainer, Carbon::now()->subDays(2));
        $this->createOrder($category, $trainer, Carbon::now()->subDays(3));
        $this->createOrder($category, $trainer, Carbon::now()->subDays(4));
        $from_date = Carbon::now()->subDays(2)->format('Y-m-d');
        $to_date = Carbon::now()->format('Y-m-d');

        $request =
            $this->createRequest(['from_date' => $from_date, 'to_date' => $to_date]);

        $tested_use_case = $this->app->make(OrderCase::class);

        // WHEN
        $response = $tested_use_case->showByCategory($category->id, $request);

        // THEN
        $this->assertInstanceOf(LengthAwarePaginator::class, $response);
        $this->assertEquals(2, $response->count());
        $this->assertInstanceOf(Order::class, $response->first());
    }
}

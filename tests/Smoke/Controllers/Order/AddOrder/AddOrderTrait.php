<?php

namespace Tests\Smoke\Controllers\Order\AddOrder;

trait AddOrderTrait
{
    public function createOrderCredentials()
    {
        $date = now()->addDay()->format('Y-m-d');

        return [
            'category_id' => $this->category->id,
            'date' => $date,
            'from_time' => '11:00',
            'to_time' => '12:00',
            'name' => 'Test order',
            'description' => 'descdescdesc',
        ];
    }

    /**
     * @param \Illuminate\Testing\TestResponse $response
     *
     * @return void
     */
    protected function assertJsonStructure(\Illuminate\Testing\TestResponse $response): void
    {
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'description',
                    'date',
                    'from_date',
                    'to_time'
                ],
            ],
        ]);
    }
}

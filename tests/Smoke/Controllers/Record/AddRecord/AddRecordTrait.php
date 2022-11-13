<?php

namespace Tests\Smoke\Controllers\Record\AddRecord;

trait AddRecordTrait
{
    public function createOrderCredentials($order_id)
    {
        return [
            'order_id' => $order_id,
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
                    'order_id',
                    'user_id',
                ],
            ],
        ]);
    }
}

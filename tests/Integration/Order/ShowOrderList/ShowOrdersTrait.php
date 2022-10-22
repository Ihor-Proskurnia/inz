<?php

namespace Tests\Integration\Order\ShowOrderList;

use App\Http\Requests\Order\OrderListRequest;
use function app;

trait ShowOrdersTrait
{
    public function createRequest(array $data): OrderListRequest
    {
        $request = new OrderListRequest($data);
        $request
            ->setContainer(app())
            ->validateResolved();

        return $request;
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Requests\Order\OrderListRequest;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\Order\OrdersCollectionResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\Order\RecordResource;
use Symfony\Component\HttpFoundation\Response;
use UseCases\Contracts\ResponseObjects\IError;
use UseCases\Order\OrderCase;
use UseCases\Record\RecordCase;

class RecordController extends Controller
{
    public function addRecord(int $order_id, RecordCase $use_case)
    {
        $user_id = auth()->id();
        $user_id = 1;
        $response = $use_case->createRecord($order_id, $user_id);

        $resource = new RecordResource($response);

        return $resource->response()->setStatusCode(Response::HTTP_CREATED);
    }
}

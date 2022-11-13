<?php

declare(strict_types=1);

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Requests\Order\OrderListRequest;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\Order\OrdersCollectionResource;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use UseCases\Contracts\ResponseObjects\IError;
use UseCases\Order\OrderCase;

class OrderController extends Controller
{
    public function showByCategory(int $category, OrderListRequest $request, OrderCase $use_case)
    {
        $response = $use_case->showByCategory($category, $request);

        $resource = new OrdersCollectionResource($response);

        return $resource->response()->setStatusCode(Response::HTTP_OK);
    }

    public function showByTrainer(int $trainer, OrderListRequest $request, OrderCase $use_case)
    {
        $response = $use_case->showByTrainer($trainer, $request);

        $resource = new OrdersCollectionResource($response);

        return $resource->response()->setStatusCode(Response::HTTP_OK);
    }

    public function addOrder(int $trainer_id, CreateOrderRequest $request, OrderCase $use_case)
    {
        $response = $use_case->createOrder($trainer_id, $request);

        $resource = new OrderResource($response);

        return $resource->response()->setStatusCode(Response::HTTP_CREATED);
    }
}

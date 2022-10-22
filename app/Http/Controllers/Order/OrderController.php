<?php

declare(strict_types=1);

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\OrderListRequest;
use App\Http\Resources\Order\OrdersCollectionResource;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
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
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Order;

use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Requests\Order\OrderListRequest;
use App\Http\Requests\Order\RecordListRequest;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\Order\OrdersCollectionResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\Order\RecordResource;
use App\Http\Resources\Order\RecordsCollectionResource;
use App\Models\Other\BadMessages;
use App\Models\ResponseMessages;
use Symfony\Component\HttpFoundation\Response;
use UseCases\Contracts\ResponseObjects\IError;
use UseCases\Order\OrderCase;
use UseCases\Record\RecordCase;

class RecordController extends Controller
{
    public function addRecord(int $order_id, RecordCase $use_case)
    {
        $user_id = auth()->id();
        $response = $use_case->createRecord($order_id, $user_id);

        $resource = new RecordResource($response);

        return $resource->response()->setStatusCode(Response::HTTP_CREATED);
    }

    public function getByUser(int $user_id, RecordListRequest $request, RecordCase $use_case)
    {
        $response = $use_case->showByUser($user_id, $request);

        $resource = new RecordsCollectionResource($response);

        return $resource->response()->setStatusCode(Response::HTTP_OK);
    }

    public function delete(int $record_id,  RecordCase $use_case)
    {
        $response = $use_case->delete($record_id);

        if ($response) {
            return response(['message' => ResponseMessages::SUCCESS_REMOVE_RECORD], Response::HTTP_OK);
        }

        return response(['message' => BadMessages::ERROR_REMOVE_RECORD], Response::HTTP_BAD_REQUEST);
    }
}

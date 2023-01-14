<?php

namespace Record;

use Illuminate\Foundation\Application;
use Illuminate\Pagination\LengthAwarePaginator;
use Order\Filters\OrderFilter;
use Order\Filters\RecordFilter;
use Record\Entities\Record;
use UseCases\Contracts\Order\Entities\IRecord;
use UseCases\Contracts\Order\IRecordListRequest;
use UseCases\Contracts\Record\IRecordCommand;

class RecordCommand implements IRecordCommand
{
    private Record $record;
    public Application $app;

    public function __construct(Record $record, Application $app)
    {
        $this->record = $record;
        $this->app = $app;
    }

    public function createRecord(int $order_id, int $user_id): IRecord
    {
        /** @var Record $record */
        $record = $this->record->newQuery()->create([
            'order_id' => $order_id,
            'user_id' => $user_id,
        ]);

        return $record;
    }

    public function showByUser(int $user_id, IRecordListRequest $request): LengthAwarePaginator
    {
        $data = $request->validated();

        $filter = $this->app->make(RecordFilter::class, ['queryParams' => array_filter($data)]);

        $query = $this->record->newQuery()
                ->where('records.user_id', '=', $user_id)
                ->join('orders', 'records.order_id', '=', 'orders.id')
                ->select([
                    'orders.date',
                    'orders.user_id as trainer_id',
                    'orders.from_time',
                    'orders.to_time',
                    'orders.name',
                    'orders.description',
                ])
                ->filter($filter);

        return $query->paginate($request->getPerPage());
    }
}

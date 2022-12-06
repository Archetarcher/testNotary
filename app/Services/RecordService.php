<?php

namespace App\Services;


use App\Http\Requests\StoreRecordRequest;
use App\Models\Record;
use App\Models\User;
use App\Services\Interfaces\RecordServiceInterface;

class RecordService implements RecordServiceInterface
{

    public function fetch(int $id): array
    {
        return Record::query()
            ->where('user_id', $id)
            ->get()
            ->toArray();
    }

    public function store(StoreRecordRequest $request)
    {
        return Record::query()
            ->create($request->all())
            ->toArray();
    }

}
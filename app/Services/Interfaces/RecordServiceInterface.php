<?php

namespace App\Services\Interfaces;

use App\Http\Requests\StoreRecordRequest;
use App\Models\User;

interface RecordServiceInterface
{
    public function fetch(int $user): array;
    public function store(StoreRecordRequest $request);
}
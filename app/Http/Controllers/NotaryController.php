<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecordRequest;
use App\Services\RecordService;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;

class NotaryController extends Controller
{
    private RecordService $recordService;
    private UserService $userService;
    public function __construct(RecordService $recordService, UserService $userService)
    {
        $this->recordService = $recordService;
        $this->userService = $userService;
    }

    public function getRecords(Request $request){
        try {
            $user = $this->userService->getUser($request);
            $records = $this->recordService->fetch($user['id']);
            return response()->json($records)->cookie('user_id', $user['id']);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
    public function store(StoreRecordRequest $request){
        try {
            $request['user_id'] = $request->cookie('user_id');
            return response()->json($this->recordService->store($request));
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}

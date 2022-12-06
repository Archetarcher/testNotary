<?php

namespace App\Services;

use App\Models\User;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;

class UserService implements UserServiceInterface
{

    public function getById(int $userId): array
    {
        return User::query()->findOrFail($userId)->toArray();
    }

    public function store()
    {
        return User::query()->create([])->toArray();
    }

    public function getUser(Request $request): array
    {
        $userId = $request->cookie('user_id');
        if ($userId){
            return $this->getById($userId);
        }
        return $this->store();
    }
}
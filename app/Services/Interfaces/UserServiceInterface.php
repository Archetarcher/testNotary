<?php

namespace App\Services\Interfaces;


use Illuminate\Http\Request;

interface UserServiceInterface
{
    public function getById(int $userId): array;
    public function store();
    public function getUser(Request $request): array;

}
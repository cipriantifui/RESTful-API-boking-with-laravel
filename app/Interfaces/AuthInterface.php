<?php

namespace App\Interfaces;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\LoginRequest;

interface AuthInterface
{
    public function create(RegisterRequest $request);

    public function login(LoginRequest $request);
}
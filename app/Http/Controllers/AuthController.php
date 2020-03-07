<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Factories\UserFactory;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Exception;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    private $userRepository;

    public function  __construct(UserFactory $userFactory)
    {
        $this->userRepository = $userFactory::createApi();
    }

    public function register(RegisterRequest $request){
        return response($this->userRepository->create($request), 201);
    }

    public function authenticate(LoginRequest $request){
        return $this->userRepository->login($request);
    }

    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                    return response()->json(['user_not_found'], 404);
            }

        }catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['status' => 'Token is Invalid']);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['status' => 'Token is Expired']);
            }else{
                return response()->json(['status' => 'Authorization Token not found']);
            }
        }

        return response()->json(compact('user'));
    }
}

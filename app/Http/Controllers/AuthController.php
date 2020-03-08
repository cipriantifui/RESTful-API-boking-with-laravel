<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Factories\AuthFactory;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;


class AuthController extends Controller
{

    private $authRepository;

    public function  __construct(AuthFactory $authFactory)
    {
        $this->authRepository = $authFactory::createApi();
    }

    public function register(RegisterRequest $request){
        return response($this->authRepository->create($request), 201);
    }

    public function authenticate(LoginRequest $request){
        return $this->authRepository->login($request);
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

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  RegisterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request){
        return response($this->authRepository->create($request), 201);
    }

    /**
     * authenticate user
     *
     * @param  LoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(LoginRequest $request){
        
        return $this->authRepository->login($request);
    }

}

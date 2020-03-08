<?php
namespace App\Repositories\Api;

use App\User;
use App\Interfaces\AuthInterface;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\LoginRequest;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Hash;

class AuthApiRepository implements AuthInterface
{
	
    public function create(RegisterRequest $request)
	{
        $user =  User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
		
		$token = JWTAuth::fromUser($user);
        return response()->json(compact('token'));
	}

	public function login(LoginRequest $request)
	{
        $credentials = $request->only(['email','password']);

		try {
			if (! $token = JWTAuth::attempt($credentials)) {
				return response()->json(['error' => 'invalid_credentials'], 400);
			}
		} catch (JWTException $e) {
			return response()->json(['error' => 'could_not_create_token'], 500);
		}

		return response()->json(compact('token'));
	}
}
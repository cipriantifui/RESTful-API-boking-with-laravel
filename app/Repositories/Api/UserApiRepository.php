<?php
namespace App\Repositories\Api;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Interfaces\RepositoryInterface;
use App\Http\Requests\Api\CreateUserRequest;
use App\Http\Requests\Api\UpdateUserRequest;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserApiRepository implements RepositoryInterface
{
    public function get($type, $value)
	{
		return User::where($type, $value)->first()->toJson();
    }
    
    public function getAll($order = 'asc', $limit = 50)
	{
		$user = null;
		if($order === null && $limit === null):
			$user =  User::all()
			->toJson();
		elseif($order !== null && $limit === null):
			$user = User::query()
			->orderBy('id', $order)
			->get()
			->toJson();
		elseif($order === null && $limit !== null):
            $user = User::query()
			->limit($limit)
            ->get()
            ->toJson();
		else:
			$user = User::query()
			->orderBy('id', $order)
			->take($limit)
			->get()
			->toJson();
		endif;
		
		return $user;
	}
	
	public function insert(CreateUserRequest $request)
	{
		$user =  User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
		
		return $user->toJson();
	}
	
	public function update(UpdateUserRequest $request, User $user)
	{
		//Update
		$user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
		]);
		
        return $user->toJson();
	}
	
	public function delete(User $user)
	{
		$user->delete();
	}

	public function create(RegisterRequest $request)
	{
		//Create user, generate token and return
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
		//Attempt validation
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
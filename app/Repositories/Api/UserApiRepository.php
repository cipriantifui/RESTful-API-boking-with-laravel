<?php
namespace App\Repositories\Api;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Interfaces\RepositoryInterface;
use App\Http\Requests\Api\CreateUserRequest;
use App\Http\Requests\Api\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

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
}
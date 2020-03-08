<?php
namespace App\Repositories\Api;

use App\User;
use App\Interfaces\RepositoryInterface;
use App\Http\Requests\Api\UserStoreRequest;
use App\Http\Requests\Api\UserModifyRequest;
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
	
	public function insert(UserStoreRequest $request)
	{
		$user =  User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
		
		return $user->toJson();
	}
	
	public function update(UserModifyRequest $request, User $user)
	{
		//Update
		$request->validated();
		User::findOrFail($user->id);

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
		User::findOrFail($user->id);

		$user->delete();
	}

}
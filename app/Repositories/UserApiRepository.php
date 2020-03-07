<?php
namespace App\Repositories\Api;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Interfaces\RepositoryInterface;

class UserApiRepository implements RepositoryInterface
{
    public function get($type, $value)
	{
		return User::where($type, $value)->first()->toJson();
    }
    
    public function getAll($order = null, $limit = null)
	{

		if($order === null && $limit === null):
			return User::all()
			->toJson();
		elseif($order !== null && $limit === null):
			return User::all()
			->orderBy('id', $order)
			->get()
			->toJson();
		elseif($order === null && $limit !== null):
            return User::all()
			->limit($limit)
            ->get()
            ->toJson();
		else:
			return User::all()
			->orderBy('id', $order)
			->take($limit)
			->get()
			->toJson();
		endif;

    }
    
}
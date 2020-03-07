<?php
namespace App\Repositories\Api;

use App\Booking;
use App\Interfaces\RepositoryInterface;

class BookingApiRepository implements RepositoryInterface
{
    public function get($type, $value)
	{
		return Booking::where($type, $value)->first()->toJson();
    }

    public function getAll($order = 'desc', $limit = 50) {

        return Booking::query()
            ->orderBy('id', $order)
            ->take($limit)
            ->get()
            ->toJson();

    }

}
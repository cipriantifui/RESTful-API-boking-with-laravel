<?php
namespace App\Repositories\Api;

use App\Booking;
use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function insert(Request $request)
	{

		$booking = Booking::create([
                        'user_id' => Auth::id(),
                        'trip_id' => $request->input('trip_id'),
                        'start_date' => $request->input('start_date'),
                        'end_date' => $request->input('end_date'),
                        'rooms' => $request->input('rooms'),
                        'guests' => $request->input('guests'),
        ]);
		
		return $booking->toJson();
    }

    public function update(Request $request, Booking $booking)
	{
		//Update
		$booking->update([
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'rooms' => $request->input('rooms'),
            'guests' => $request->input('guests'),
		]);
		
        return $booking->toJson();
	}

}
<?php
namespace App\Repositories\Api;

use App\Booking;
use App\Interfaces\RepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\BookingUpdateRequest;
use App\Http\Requests\Api\BookingStoreRequest;

class BookingApiRepository implements RepositoryInterface
{
    public function get($type, $value)
	{
        return Booking::where($type, $value)
                ->where("user_id", Auth::id())
                ->first()->toJson();
    }

    public function getAll($order = 'desc', $limit = 50) 
    {
        return Booking::query()
            ->where("user_id", Auth::id())
            ->orderBy('id', $order)
            ->take($limit)
            ->get()
            ->toJson();

    }

    public function insert(BookingStoreRequest $request)
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

    public function update(BookingUpdateRequest $request, Booking $booking)
	{
		$booking->update([
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'rooms' => $request->input('rooms'),
            'guests' => $request->input('guests'),
		]);
		
        return $booking->toJson();
    }
    
    public function delete(Booking $booking)
	{
		$booking->delete();
	}

}
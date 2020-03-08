<?php

namespace App\Repositories\Api;

use App\Interfaces\FilterRepositoryInterface;
use App\Trip;
use Illuminate\Http\Request;
use App\Http\Requests\Api\TripStoreRequest;
use App\Http\Requests\Api\TripUpdateRequest;
use Illuminate\Support\Str;

class TripApiRepository implements FilterRepositoryInterface {

    public function get($type, $value) {

        $trip = Trip::where($type, $value)->first();
        
        if($trip==null)
            Trip::findOrFail(-1);
        
        return $trip->toJson();
    }

    public function getAll($order = 'desc', $limit = 50) {
        return Trip::query()
            ->orderBy('id', $order)
            ->take($limit)
            ->get()
            ->toJson();
    }

    public function filter(Request $request){
        
        $tripQuery = Trip::query();
        
        $tripQuery->when($request->has('title'), function ($q) {
            return $q->where('title', 'like', '%'.request('title').'%');
        });

        $tripQuery->when($request->has('description'), function ($q) {
            return $q->where('description', 'like', '%'.request('description').'%');
        });

        $tripQuery->when($request->has('location'), function ($q) {
            return $q->where('location', 'like', '%'.request('location').'%');
        });

        $tripQuery->when($request->has('orderBy'), function ($q) {
            return $q->orderBy(request('orderBy'), request("order") == null ? "asc" : request("order"));
        });

        $tripQuery->when($request->has('priceFrom'), function ($q) {
            return $q->where('price', '>=', request('priceFrom'));
        });

        $tripQuery->when($request->has('priceTo'), function ($q) {
            return $q->where('price', '<=', request('priceTo'));
        });

        return $tripQuery->get();
    }

    public function insert(TripStoreRequest $request)
	{

        $tripQuery = Trip::query()
        ->orderBy("id", 'desc')
        ->pluck('id')
        ->first();

        $slug = Str::slug($request->input('title')." ".$tripQuery, '-');
		$trip = Trip::create([
            'slug' => $slug,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'location' => $request->input('location'),
            'price' => $request->input('price'),
        ]);
		
		return $trip->toJson();
    }
    
    public function update(TripUpdateRequest $request, Trip $trip)
	{
        Trip::findOrFail($trip->id);
		$trip->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'location' => $request->input('location'),
            'price' => $request->input('price'),
		]);
		
        return $trip->toJson();
    }
    
    public function delete(Trip $trip)
	{
        Trip::findOrFail($trip->id);
		$trip->delete();
	}
    
}
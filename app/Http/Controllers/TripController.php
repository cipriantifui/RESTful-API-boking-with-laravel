<?php

namespace App\Http\Controllers;

use App\Trip;
use Illuminate\Http\Request;
use App\Http\Requests\Api\TripStoreRequest;
use App\Http\Requests\Api\TripUpdateRequest;
use App\Factories\TripFactory;

class TripController extends Controller
{
    private $tripRepository;

    public function  __construct(TripFactory $tripFactory)
    {
        $this->tripRepository = $tripFactory::createApi();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trip = $this->tripRepository->getAll();
        
        return $trip;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TripStoreRequest $request)
    {
        return response($this->tripRepository->insert($request), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return $this->tripRepository->get('slug', $request ->slug);
    }

    public function search(Request $request)
    {
        $trip = $this->tripRepository->filter($request);
        
        return $trip;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(TripUpdateRequest $request, Trip $trip)
    {
        return response($this->tripRepository->update($request, $trip));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        return response($this->tripRepository->delete($trip), 404);
    }
}

<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Factories\BookingFactory;
use App\Http\Requests\Api\BookingUpdateRequest;
use App\Http\Requests\Api\BookingStoreRequest;

class BookingController extends Controller
{
    private $bookingRepository;

    public function  __construct(BookingFactory $bookingFactory)
    {
        $this->bookingRepository = $bookingFactory::createApi();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = $this->bookingRepository->getAll();
        return $reservations;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingStoreRequest $request)
    {
        return response($this->bookingRepository->insert($request), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        return $this->bookingRepository->get('id', $booking->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function update(BookingUpdateRequest $request, Booking $booking)
    {
        return response($this->bookingRepository->update($request, $booking));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        return response($this->bookingRepository->delete($booking), 404);

    }
}

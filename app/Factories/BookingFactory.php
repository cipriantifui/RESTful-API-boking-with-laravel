<?php

namespace App\Factories;

use App\Interfaces\FactoryInterface;
use App\Repositories\Api\BookingApiRepository;


class BookingFactory implements FactoryInterface
{

	static public function createApi() {
        return new BookingApiRepository();
    }

}
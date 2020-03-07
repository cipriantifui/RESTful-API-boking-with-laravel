<?php

namespace App\Factories;

use App\Interfaces\FactoryInterface;
use App\Repositories\Api\TripApiRepository;


class TripFactory implements FactoryInterface
{

	static public function createApi() {
        return new TripApiRepository();
    }

}
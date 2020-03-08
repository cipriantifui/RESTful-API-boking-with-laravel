<?php

namespace App\Factories;

use App\Interfaces\FactoryInterface;
use App\Repositories\Api\AuthApiRepository;

class AuthFactory implements FactoryInterface
{

	static public function createApi() {
        return new AuthApiRepository();
    }

}
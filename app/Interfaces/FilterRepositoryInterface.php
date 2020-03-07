<?php

namespace App\Interfaces;

use App\Interfaces\RepositoryInterface;
use Illuminate\Http\Request;

interface FilterRepositoryInterface extends RepositoryInterface
{

	public function filter(Request $request);

}
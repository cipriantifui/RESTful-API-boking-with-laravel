<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Trip;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Trip::truncate();

        $usersQuantity = 50;
        factory(User::class, $usersQuantity)->create();

        $this->call(TripsTableSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Trip;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('trips')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $usersQuantity = 20;
        factory(User::class, $usersQuantity)->create();

        $this->call(TripsTableSeeder::class);
    }
}

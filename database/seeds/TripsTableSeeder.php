<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Trip;

class TripsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        $slug1 = Str::slug('Beachfront Ground Floor Steps to Beach 1' , '-');
        $trip1 = Trip::create(['slug' => $slug1, 'title' => 'Beachfront Ground Floor Steps to Beach', 'description' => 'Our condo is 2 bedroom and 2 baths with a maximum occupancy of 6. It is GROUND FLOOR WALKOUT to the beach! You can wake up to a beautiful sunrise every morning from the comfort of your master bedroom. Each condominium is ground floor in the center of the building and literally steps to the beach! Enjoy the panoramic views from the master bedroom, living room and kitchen. Relax on the patio in the evening and enjoy the sound of the ocean and the peacefulness provided by a very special condominium in a very special place.', 'start_date' => '2020-03-20 00:00:00', 'end_date' => '2020-03-24 00:00:00', 'location'=>'Texas', 'price'=> '800']);
        
        $slug2 = Str::slug('Isla Grand Beach Resort 2' , '-');
        $trip2 = Trip::create(['slug' => $slug2, 'title' => 'Isla Grand Beach Resort', 'description' => 'The Isla Grand Beach Resort is the premier resort along the Texas Gulf Coast. Located right on the beach, in the southern portion of South Padre Island, the Isla Grand Beach Resort is easy to find and conveniently located near all of South Padre\'s top attractions.', 'start_date' => '2020-03-24 00:00:00', 'end_date' => '2020-03-30 00:00:00', 'location'=>'Greece', 'price'=> '600']);
        
        $slug3 = Str::slug('Isla Grand Beach Resort 3' , '-');
        $trip3 = Trip::create(['slug' => $slug3, 'title' => 'Isla Grand Beach Resort', 'description' => 'The Isla Grand Beach Resort is the premier resort along the Texas Gulf Coast. Located right on the beach, in the southern portion of South Padre Island, the Isla Grand Beach Resort is easy to find and conveniently located near all of South Padre\'s top attractions.', 'start_date' => '2020-03-24 00:00:00', 'end_date' => '2020-03-30 00:00:00', 'location'=>'Spain', 'price'=> '800']);
    }
}

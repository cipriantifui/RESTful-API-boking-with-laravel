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
        $date_start = strtotime(date('Y-m-d', strtotime("+7 days")));
        $date_end = strtotime(date('Y-m-d', strtotime("+14 days")));
        $slug = Str::slug('Beachfront Ground Floor Steps to Beach 1' , '-');
        $book1 = Trip::create(['slug' => $slug, 'title' => 'Beachfront Ground Floor Steps to Beach', 'description' => 'Our condo is 2 bedroom and 2 baths with a maximum occupancy of 6. It is GROUND FLOOR WALKOUT to the beach! You can wake up to a beautiful sunrise every morning from the comfort of your master bedroom. Each condominium is ground floor in the center of the building and literally steps to the beach! Enjoy the panoramic views from the master bedroom, living room and kitchen. Relax on the patio in the evening and enjoy the sound of the ocean and the peacefulness provided by a very special condominium in a very special place.', 'start_date' => '2020-03-20 00:00:00', 'end_date' => '2020-03-24 00:00:00', 'location'=>'Texas']);
    }
}

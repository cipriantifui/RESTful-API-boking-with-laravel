<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TrippTest extends TestCase
{
    /**
     * When slug is not present in database 404 HTTP status must be returned
     * 
     * @return void
     */
    public function testTripNotFound()
    {
        $response = $this->json('GET', '/api/trips/isla-grand-beach-resort-121');

        $response->assertStatus(404);
    }

    /**
     *
     */
    public function testGetAllTrips()
    {
        $response = $this->json('GET', '/api/trips/search?title=i&orderBy=title&order=desc');
        $response->dumpHeaders();
        $response->dump();
    }
}

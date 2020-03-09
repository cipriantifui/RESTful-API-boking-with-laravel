<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UniqueEmailRegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json('POST', 'api/auth/register', ['first_name'=>'test_fname','last_name'=>'test_lname','email'=>'test1@email.com','password'=>'123321']);

        $response->assertStatus(422);
    }
}

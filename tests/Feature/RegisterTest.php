<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     *
     * When email is not unique 422 HTTP status must be returned.
     * 
     * @return void
     */
    public function testEmailUniqueValidation()
    {
        $response = $this->json('POST', 'api/auth/register', ['first_name'=>'test_fname','last_name'=>'test_lname','email'=>'test1@email.com','password'=>'123321']);

        $response->assertStatus(422);
    }

    /**
     * 
     * When email is invalid 422 HTTP status must be returned.
     *
     * 
     * 
     * @return void
     */
    public function testInvalidMailFormat()
    {
        $response = $this->json('POST', 'api/auth/authenticate', ['email'=>'email6email.com','password'=>'123321']);

        $response->assertStatus(422);
    }
}

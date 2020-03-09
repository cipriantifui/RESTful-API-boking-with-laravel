<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthauthenticateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json('POST', 'api/auth/authenticate', ['email'=>'email6@email.com','password'=>'123321']);

        $response
            ->assertStatus(200);
    }
    
}

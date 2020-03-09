<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthauthenticateTest extends TestCase
{
    /**
     * When user and password correspond to a database record, 200 HTTP status must be returned.
     * @return void
     */
    public function testSuccessfullAuthentication()
    {
        $response = $this->json('POST', 'api/auth/authenticate', ['email'=>'email6@email.com','password'=>'123321']);

        $response
            ->assertStatus(200);
    }
    
      /**
     * When password is wrong 400 HTTP status must be returned.
     *
     * @return void
     */
    public function testWrongPassword()
    {
        $response = $this->json('POST', 'api/auth/authenticate', ['email'=>'email6@email.com','password'=>'11111']);

        $response->assertStatus(400);
    }
}

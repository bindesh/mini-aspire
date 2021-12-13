<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function loginTestWithoutPassword(){
        $data = ['email' => 'bindeshpandya@hotmail.com'];
        $response = $this->json('POST','/api/login', $data);
        $response->assertStatus(401);
        $response->assertJson(['error' => 'Unauthorized']);
    }

    public function loginTestWithValidCred(){
        $user = factory(User::class)->create([
            'name' => 'aspire',
            'email' => 'mini@aspire.com',
            'password' => bcrypt('secret'),
        ]);

        $payload = ['email' => 'ini@aspire.com', 'password' => 'secret'];

        $this->json('POST', '/api/login', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                    'access_token',
                    'token_type',
                    'expires_in',
            ]);
    }
}

<?php

namespace Tests\Smoke\Controllers\Auth\Login;

use function route;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use LoginTrait;
    use RefreshDatabase;

    /**
     * @feature Auth
     * @scenario Login
     * @case Successfully login
     *
     * @test
     */
    public function login_success_response201()
    {
        // GIVEN
        $credentials = $this->createCredentials();
        $this->createUser();

        // WHEN
        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->json('post', route('login'), $credentials);

        // THEN
        $this->assertEquals(201, $response->getStatusCode());
    }

    /**
     * @feature Auth
     * @scenario Login
     * @case Failed login, no email given
     *
     * @dataProvider wrongCredentials
     *
     * @param array $credentials
     *
     * @test
     */
    public function login_success_emailIsNotEmail(array $credentials)
    {
        // GIVEN
        $this->createUser();

        // WHEN
        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->json('post', route('login'), $credentials);

        // THEN
        $this->assertEquals(422, $response->getStatusCode());
    }

    /**
     * @feature Auth
     * @scenario Login
     * @case Successfully login
     *
     * @test
     */
    public function login_success_checkJsonStructure()
    {
        // GIVEN
        $credentials = $this->createCredentials();
        $this->createUser();

        // WHEN
        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->json('post', route('login'), $credentials);

        // THEN
        $response->assertJsonStructure([
            'data' => [
                'id',
                'token',
                'name',
            ],
        ]);
    }

    /**
     * @feature Auth
     * @scenario Login
     * @case Failed login
     *
     * @dataProvider wrongCredentials
     *
     * @param array $credentials
     *
     * @test
     */
    public function login_failed_checkJsonStructure($credentials)
    {
        // GIVEN
        $this->createUser();

        // WHEN
        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->json('post', route('login'), $credentials);

        // THEN
        $response->assertStatus(422);
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }

    /**
     * @feature Auth
     * @scenario Login
     * @case Failed login
     *
     * @expectation Expecting error http Status Code (400)
     *
     * @test
     */
    public function login_wrongEmail_response400()
    {
        // GIVEN
        $credentials = $this->createCredentials('wrong@example.com', 'Password1');
        $this->createUser();

        // WHEN
        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->json('post', route('login'), $credentials);

        // THEN
        $this->assertEquals(400, $response->getStatusCode());
        $response->assertJsonStructure([
            'message',
        ]);
    }

    /**
     * @feature Auth
     * @scenario Login
     * @case Failed login
     *
     * @expectation Expecting error http Status Code (400)
     *
     * @test
     */
    public function login_wrongPassword_response400()
    {
        // GIVEN
        $credentials = $this->createCredentials('email@example.com', 'password1');
        $this->createUser();

        // WHEN
        $response = $this->withHeaders(['Accept' => 'application/json'])
            ->json('post', route('login'), $credentials);

        // THEN
        $this->assertEquals(400, $response->getStatusCode());
        $response->assertJsonStructure([
            'message',
        ]);
    }
}

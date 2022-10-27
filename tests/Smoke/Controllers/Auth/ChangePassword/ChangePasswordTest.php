<?php

namespace Tests\Smoke\Controllers\Auth\ChangePassword;

use function route;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChangePasswordTest extends TestCase
{
    use ChangePasswordTrait;
    use RefreshDatabase;

    /**
     * @feature Auth
     * @scenario Change Password
     * @case Success change password
     *
     * @test
     */
    public function changePassword_passwordChanged_response201()
    {
        // GIVEN
        $this->createUserAndBe('email@example.com');
        $credentials = $this->createCredentials('password', 'Password2', 'Password2');

        // WHEN
        $response = $this->json('post', route('change'), $credentials);

        // THEN
        $this->assertEquals(201, $response->getStatusCode());
        $response->assertJsonStructure([
            'message',
        ]);
    }

    /**
     * @feature Auth
     * @scenario Change Password
     * @case Failed change password, user not login
     *
     * @test
     */
    public function changePassword_notLogin_response401()
    {
        // GIVEN
        $this->createUser('email@example.com');
        $credentials = $this->createCredentials('Password1', 'Password1', 'Password1');

        // WHEN
        $response = $this->json('post', route('change'), $credentials);

        // THEN
        $this->assertEquals(401, $response->getStatusCode());
        $response->assertJsonStructure([
            'message',
        ]);
    }

    /**
     * @feature Auth
     * @scenario Change Password
     * @case Failed change password, wrong old password
     *
     * @test
     */
    public function changePassword_wrongOldPassword_response403()
    {
        // GIVEN
        $this->createUserAndBe('email@example.com');
        $credentials = $this->createCredentials('wrongPassword', 'Password1', 'Password1');

        // WHEN
        $response = $this->json('post', route('change'), $credentials);

        // THEN
        $this->assertEquals(403, $response->getStatusCode());
        $response->assertJsonStructure([
            'message',
        ]);
    }

    /**
     * @feature Auth
     * @scenario Change Password
     * @case Failed change password, wrong credentials
     *
     * @dataProvider badRequests403
     *
     * @param array $request
     * @test
     */
    public function changePassword_wrongCredentials_response403($request)
    {
        // GIVEN
        $this->createUserAndBe('email@example.com');

        // WHEN
        $response = $this->json('post', route('change'), $request);

        // THEN
        $this->assertEquals(403, $response->getStatusCode());
        $response->assertJsonStructure([
            'message',
        ]);
    }
}

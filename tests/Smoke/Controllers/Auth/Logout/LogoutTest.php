<?php

namespace Tests\Smoke\Controllers\Auth\Logout;

use function route;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoutTest extends TestCase
{
    use LogoutTrait;
    use RefreshDatabase;

    /**
     * @feature Auth
     * @scenario Logout
     * @case Successfully logout
     *
     * @test
     */
    public function logout_success_response200()
    {
        // GIVEN
        /** @var User $user */
        $user = $this->createUserAndBe();
        $token = $user->createToken($user->name, false)->plainTextToken;

        // WHEN
        $response = $this->json('GET', route('logout'))->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ]);

        // THEN
        $this->assertEquals(200, $response->getStatusCode());
//        $this->assertDatabaseCount('personal_access_tokens', 0);
    }

    /**
     * @feature Auth
     * @scenario Logout
     * @case Failed logout, wrong bearer
     *
     * @test
     */
    public function logout_wrongToken_response401()
    {
        // GIVEN
        /** @var User $user */
        $user = $this->createUser();

        $user->createToken('chrome', false)->plainTextToken;
        $token = 'token';

        // WHEN
        $response = $this->json('GET', route('logout'))->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ]);

        // THEN
        $this->assertEquals(401, $response->getStatusCode());
    }
}

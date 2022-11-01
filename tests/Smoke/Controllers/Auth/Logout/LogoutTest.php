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
    }

    /**
     * @feature Auth
     * @scenario Logout
     * @case Successfully web logout
     *
     * @test
     */
    public function logout_successWebDevice_response200()
    {
        $this->markTestSkipped("FIX MIDDLEWARE");
        // GIVEN
        /** @var User $user */
        $user = $this->createUserAndBe();
        $mobile_token = $user->createToken('Mozilla', false)->plainTextToken;
        $web_token = $user->createToken('Mozilla', false)->plainTextToken;

        // WHEN
        $response = $this->json('GET', route('logout'))->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $web_token,
        ]);

        // THEN
        $access_token = $this->user->tokens->first();
        $this->assertEquals($access_token->id,  $this->user->withAccessToken($mobile_token)->tokens->first->id->id);
        $this->assertDatabaseCount('personal_access_tokens', 1);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertCount(1, $user->tokens()->get());
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

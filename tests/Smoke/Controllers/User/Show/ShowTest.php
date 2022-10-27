<?php

namespace Tests\Smoke\Controllers\User\Show;

use function route;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @feature User
     * @scenario Show user
     * @case Successfully show user
     *
     * @test
     */
    public function showUser_goodRole_responseOk()
    {
        // GIVEN
        $user = $this->createUserAndBe();

        // WHEN
        $response = $this->json('GET', route('user.show', ['user' => $user->id]));

        // THEN
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @feature User
     * @scenario Show user
     * @case Successfully show user
     *
     * @test
     */
    public function showUser_goodRole_checkJson()
    {
        // GIVEN
        $user = $this->createUserAndBe();

        // WHEN
        $response = $this->json('GET', route('user.show', ['user' => $user->id]));

        // THEN
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'email',
            ],
        ]);
    }

    /**
     * @feature User
     * @scenario Show user
     * @case Failed show user, unauthorized
     *
     * @test
     */
    public function showUser_notLogged_responseUnauthorized()
    {
        // GIVEN
        $user = $this->createUser();

        // WHEN
        $response = $this->json('get', route('user.show', ['user' => $user->id]));

        // THEN
        $response->assertUnauthorized();
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }

    /**
     * @feature User
     * @scenario Show user
     * @case Failed show user
     *
     * @test
     */
    public function showUser_userNotExist_responseNotFound()
    {
        // GIVEN
        $this->createUserAndBe();

        // WHEN
        $response = $this->json('GET', route('user.show', ['user' => -1]));
        // THEN
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }
}

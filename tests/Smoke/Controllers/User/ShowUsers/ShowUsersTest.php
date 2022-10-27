<?php

namespace Tests\Smoke\Controllers\User\ShowUsers;

use function route;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowUsersTest extends TestCase
{
    use RefreshDatabase;
    use ShowUsersTrait;

    /**
     * @feature User
     * @scenario Show user list
     * @case Successfully show user list
     *
     * @dataProvider goodRoles
     *
     * @param array $roles
     *
     * @test
     */
    public function showUsers_goodRoles_responseOk($roles)
    {
        // GIVEN
        $this->createUserAndBe('email@email.com', $roles);

        // WHEN
        $response = $this->json('get', route('users.show'));

        // THEN
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @feature User
     * @scenario Show user list
     * @case Successfully show user list
     *
     * @dataProvider goodRoles
     *
     * @param array $roles
     *
     * @test
     */
    public function showUsers_goodRoles_checkJson($roles)
    {
        // GIVEN
        $this->createUserAndBe('email@email.com', $roles);

        // WHEN
        $response = $this->json('get', route('users.show'));

        // THEN
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'email',
                ],
            ],
        ]);
    }

    /**
     * @feature User
     * @scenario Show user list
     * @case Failed show user, not logged
     *
     * @test
     */
    public function showUsers_notLogged_responseUnauthorized()
    {
        // GIVEN
        $this->createUser();

        // WHEN
        $response = $this->json('get', route('users.show'));

        // THEN
        $response->assertUnauthorized();
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }

    /**
     * @feature User
     * @scenario Show user list
     * @case Failed show user, no access
     * @dataProvider wrongRoles
     *
     * @param array $roles
     *
     * @test
     */
    public function showUsers_noAccess_responseForbidden($roles)
    {
        // GIVEN
        $this->createUserAndBe('email@email.com', $roles);

        // WHEN
        $response = $this->json('get', route('users.show'));
        // THEN
        $this->assertEquals(403, $response->getStatusCode());
        $this->assertJson($response->baseResponse->getContent());
        $response->assertJsonStructure([
            'message',
        ]);
    }
}

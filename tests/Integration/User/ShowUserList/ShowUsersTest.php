<?php

namespace Tests\Integration\User\ShowUserList;

use Tests\TestCase;
use App\Models\User;
use UseCases\User\UserCase;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowUsersTest extends TestCase
{
    use RefreshDatabase;
    use ShowUsersTrait;

    /**
     * @test
     */
    public function showUsers_success_checkResponse()
    {
        // GIVEN
        $this->createUserAndBe();
        $this->createUser();
        $request = $this->createRequest([]);
        $tested_use_case = $this->app->make(UserCase::class);

        // WHEN
        $response = $tested_use_case->showUsers($request);

        // THEN
        $this->assertInstanceOf(LengthAwarePaginator::class, $response);
        $this->assertEquals(2, $response->count());
        $this->assertInstanceOf(User::class, $response->first());
    }
}

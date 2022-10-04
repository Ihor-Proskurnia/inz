<?php

namespace Tests\Integration\UseCase\User\Update;

use Tests\TestCase;
use App\Models\User;
use UseCases\User\UserCase;
use App\Models\Other\RoleType;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateUserTest extends TestCase
{
    use RefreshDatabase;
    use UpdateUserTrait;

    /**
     * @feature User
     * @scenario Update user list
     * @case Successfully update user
     *
     * @test
     */
    public function update_success_checkDB()
    {
        // GIVEN
        $user = $this->createUserAndBe();
        $credentials = $this->createCredentials();
        $tested_use_case = $this->app->make(UserCase::class);

        // WHEN
        $response = $tested_use_case->update($credentials, $user);

        // THEN
        $this->assertDatabaseHas(User::class, $response->toArray());
        $this->assertDatabaseCount(User::class, 1);
    }

    /**
     * @feature User
     * @scenario Update user list
     * @case Successfully update user
     *
     * @test
     */
    public function update_success_checkResponse()
    {
        // GIVEN
        $user = $this->createUserAndBe();
        $credentials = $this->createCredentials();
        $tested_use_case = $this->app->make(UserCase::class);

        // WHEN
        $response = $tested_use_case->update($credentials, $user);

        // THEN
        $this->assertInstanceOf(User::class, $response);
        $this->assertEquals('Some', $response->name);
        $this->assertEquals('Name', $response->surname);
        $this->assertEquals('81500000', $response->phone);
        $this->assertEquals('0010', $response->post_code);
        $this->assertEquals('Oslo', $response->city);
        $this->assertEquals('street', $response->street);
        $this->assertEquals('1234567890', $response->bank_account);
        $this->assertEquals('0000000000', $response->social_security);
        $this->assertEquals('26.50', $response->salary_per_hour);
    }

    /**
     * @feature User
     * @scenario Update user list
     * @case Successfully update user
     *
     * @test
     */
    public function update_success_checkRoles()
    {
        // GIVEN
        $user = $this->createUserAndBe();
        $credentials = $this->createCredentials();
        $tested_use_case = $this->app->make(UserCase::class);

        // WHEN
        $response = $tested_use_case->update($credentials, $user);

        // THEN
        $this->assertInstanceOf(User::class, $response);
        $this->assertEquals(RoleType::DRIVER, $response->getRoles()->first());
        $this->assertEquals(RoleType::MODERATOR, $response->getRoles()->last());
    }
}

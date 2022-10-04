<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Sanctum\Sanctum;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function createUser($email = 'email@example.com')
    {
        $this->user = User::factory()->state([
            'email' => $email,
            'name' => 'John',
        ])->create();

        return $this->user;
    }

    protected function createUserAndBe($email = 'admin@example.com')
    {
        $this->createUser($email);
        Sanctum::actingAs($this->user);

        return $this->user;
    }
}

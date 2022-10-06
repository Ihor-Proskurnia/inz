<?php

namespace Tests;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Sanctum\Sanctum;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function createUserAndBe($email = 'admin@example.com')
    {
        $this->createUser($email);
        Sanctum::actingAs($this->user);

        return $this->user;
    }

    public function createUser($email = 'email@example.com')
    {
        $this->user = User::factory()->state([
            'email' => $email,
            'name' => 'John',
        ])->create();

        return $this->user;
    }

    public function createCategory()
    {
        $this->category = Category::factory()->create();

        return $this->category;
    }
}

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

    public function createUser($email = 'email@example.com', $name = 'John')
    {
        $this->user = User::factory()->state([
            'email' => $email,
            'name' => $name,
        ])->create();

        return $this->user;
    }

    public function createCategory($name = "Cat 1")
    {
        $this->category = Category::factory()->state([
            'name' => $name,
        ])->create();

        return $this->category;
    }
}

<?php

namespace Tests;

use App\Models\Category;
use App\Models\Order;
use App\Models\Other\RoleType;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Sanctum\Sanctum;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function createUserAndBe($email = 'admin@example.com', $roles = RoleType::ADMIN)
    {
        $this->createUser($email, $roles);
        Sanctum::actingAs($this->user);

        return $this->user;
    }

    public function createUser(
        $email = 'email@example.com', $role = RoleType::ADMIN, $name = 'John'
    )
    {
        $this->user = User::factory()->state([
            'email' => $email,
            'name' => $name,
        ])->create();
        $this->user->assign($role);

        return $this->user;
    }

    public function createCategory($name = "Cat 1")
    {
        $this->category = Category::factory()->state([
            'name' => $name,
        ])->create();

        return $this->category;
    }

    public function createOrder($category, $trainer, $date = null, $from_time = '9', $to_time = '11')
    {
        $this->order = Order::factory()->state([
            'category_id' => $category->id,
            'user_id' => $trainer->id,
            'date' => $date ?? now()->format('Y-m-d'),
            'from_time' => $from_time,
            'to_time' => $to_time
        ])->create();

        return $this->order;
    }
}

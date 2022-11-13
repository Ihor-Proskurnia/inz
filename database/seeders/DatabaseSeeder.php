<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Other\RoleType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create();
        $admin->assign(RoleType::ADMIN);

        $trainer = User::factory()->create();
        $trainer->assign(RoleType::TRAINER);

        $sportsman = User::factory()->create();
        $sportsman->assign(RoleType::SPORTSMAN);

//         \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);
    }
}

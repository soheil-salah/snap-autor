<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Users\User;
use App\Models\Users\UserRole;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(100)->create()->each(function($user){

            UserRole::updateOrCreate(['user_id' => $user->id],[
                'user_id' => $user->id,
                'role_id' => 1
            ]);
        });
    }
}

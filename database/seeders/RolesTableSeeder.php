<?php

namespace Database\Seeders;

use App\Models\Users\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'user',
            'author',
            'editor'
        ];

        foreach($roles as $role_type){

            Role::firstOrCreate(['type' => $role_type],[
                'type' => $role_type
            ]);
        }
    }
}

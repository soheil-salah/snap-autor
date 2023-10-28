<?php

namespace Database\Seeders;

use App\Models\Blog\PostAuthor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostAuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostAuthor::factory(20)->create();
    }
}

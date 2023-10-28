<?php

namespace Database\Seeders;

use App\Models\Blog\Post;
use App\Models\Blog\PostAuthor;
use App\Models\Blog\PostCategory;
use App\Models\Blog\PostTag;
use App\Models\Blog\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreatePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(PostCategory::count() < 10){

            PostCategory::factory(10)->create();

            Tag::factory(50)->create();
        }

        if(Post::count() < 20){

            Post::factory(20)->create()->each(function($post){

                PostAuthor::create([
                    'post_id' => $post->id,
                    'byAdmin' => 1,
                ]);
            });

            PostTag::factory(50)->create();
        }
    }
}

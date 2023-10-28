<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Author;
use App\Models\Blog\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\PostAuthor>
 */
class PostAuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => Post::all()->random()->id,
            'byAdmin' => 1
        ];
    }
}

<?php

namespace Database\Factories\Blog;

use App\Models\Blog\PostCategory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(3);
        
        return [
            'post_category_id' => PostCategory::all()->random()->id,
            'title' => $title,
            'short_description' => $this->faker->text($maxNbChars = 200), 
            'content' => $this->faker->text(),
            'slug' => Str::slug($title),
            'posted_at' => Carbon::now()
        ];
    }
}

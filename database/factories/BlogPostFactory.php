<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title       = fake()->sentence(rand(3, 8), true);
        $slug        = Str::slug($title);
        $text        = fake()->realText(rand(1000, 2000));
        $isPublished = rand(1, 5) > 1;
        $createdAt   = fake()->dateTimeBetween('-3 month', '-2 month');

        return [
            'category_id'  => rand(1, 11),
            'user_id'      => (rand(1, 5) == 5) ? 1 : 2,
            'title'        => $title,
            'slug'         => $slug,
            'excerpt'      => fake()->realText(rand(40, 100)),
            'content_raw'  => $text,
            'content_html' => $text,
            'is_published' => $isPublished,
            'published_at' => $isPublished ? fake()->dateTimeBetween('-2 month', '-1 days') : null,
            'created_at'   => $createdAt,
            'updated_at'   => $createdAt,
        ];
    }
}

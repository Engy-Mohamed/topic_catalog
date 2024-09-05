<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'topic_title' => fake()->company(),
            'content' => fake()->paragraph(),
            'published' => fake()->numberBetween(0, 1), 
            'trending' => fake()->numberBetween(0, 1), 
            'image' => basename(fake()->image(public_path('assets\images\topics'))),
            'no_of_views' => fake()->numberBetween(0, 20), 
            /*category_id : we don't need it due to adding the topics as 
            part of the category in DatabaseSeeder*/
        ];
    }
}

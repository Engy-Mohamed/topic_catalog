<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'message_subject' => fake()->company(),
            'sender_name' => fake()->name(),
            'sender_email' => fake()->safeEmail(),
            'content' => fake()->text(500),
            'read' => fake()->numberBetween(0, 1),         
        ];
    }
}

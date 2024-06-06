<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'message' => $this->faker->text(1000),
            //this to is optional
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Generates random date within the last year
            'updated_at' => now(), // Optionally set updated_at to current time or any desired value

        ];
    }
}

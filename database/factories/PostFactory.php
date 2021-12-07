<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'body' => $this->faker->paragraph(50),
            'price' => $this->faker->randomFloat(2, 0, 100000),
            'status' => $this->faker->randomElement(['active', 'completed', 'deleted']),
            'views' => rand(0, 10000)
        ];
    }
}

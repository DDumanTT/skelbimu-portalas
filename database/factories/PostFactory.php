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
            'body' => $this->faker->paragraph(5),
            'img_path' => $this->faker->imageUrl(),
            'status' => array_rand(['active', 'completed', 'deleted']),
            'user_id' => User::inRandomOrder()->get(),
        ];
    }
}

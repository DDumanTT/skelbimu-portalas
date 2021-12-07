<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Message;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'text' => $this->faker->sentence(),
            'date' => $this->faker->date(),
            'post_id' => Post::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}

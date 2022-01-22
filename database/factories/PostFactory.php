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
            'user_id' => User::factory(),
            'title' => $this->faker->realText(20),
            'body' => $this->faker->realText(100),
            'updated_at' => $this->faker->dateTimeBetween('-10days', '0days'),
        ];
    }
}

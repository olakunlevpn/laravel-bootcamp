<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chirp>
 */
class ChirpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'message' => $this->faker->paragraph,
        ];
    }


    public function forUser()
    {
        return $this->state(function (array $attributes, User $user) {
            return [
                'user_id' => $user->id,
            ];
        });
    }
}

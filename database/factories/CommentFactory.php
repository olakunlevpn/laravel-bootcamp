<?php

namespace Database\Factories;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'commentable_id' => Chirp::factory(),
            'commentable_type' => Chirp::class,
            'comment' => $this->faker->sentence,
            'is_approved' => $this->faker->boolean,
            'user_id' => User::factory(),
        ];
    }


    public function forChirp()
    {
        return $this->state(function (array $attributes, Chirp $chirp) {
            return [
                'commentable_id' => $chirp->id,
                'commentable_type' => Chirp::class,
            ];
        });
    }
}

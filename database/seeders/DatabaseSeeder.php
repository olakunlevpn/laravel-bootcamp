<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Chirp;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Closure;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $users = User::factory()
            ->count(3)
            ->has(
                Chirp::factory()
                    ->count(30)
                    ->has(
                        Comment::factory()
                            ->count(random_int(1,5))
                            ->forChirp(),
                        'comments'
                    )
                    ->forUser(),
                'chirps'
            )
            ->create();

    }
}

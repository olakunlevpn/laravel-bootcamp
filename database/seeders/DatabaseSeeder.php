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


        $users = User::factory()->count(3)->create();

        foreach ($users as $user) {
            $chirps = Chirp::factory()->count(30)->create([
                'user_id' => $user->id,
            ]);

            foreach ($chirps as $chirp) {
                Comment::factory()->count(random_int(1, 5))->create([
                    'commentable_id' => $chirp->id,
                    'user_id' => $user->id,
                ]);
            }
        }


//        $users = User::factory()
//            ->count(3)
//            ->has(
//                Chirp::factory()
//                    ->count(30)
//                    ->forUser()
//                    ->has(
//                        Comment::factory()
//                            ->count(10)
//                            ->forChirp()
//                    )
//            )
//            ->create();



        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);





    }
}

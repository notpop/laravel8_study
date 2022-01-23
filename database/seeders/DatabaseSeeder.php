<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory(10)->create()->each(function($user) {
            Post::factory(random_int(2, 5))->create(['user_id' => $user])->each(function($post) {
                Comment::factory(random_int(1, 1))->create(['post_id' => $post]);
            });
        });

        User::first()->update([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Blog;
use App\Models\Comment;
use App\Models\User;
use App\Post;
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
        User::factory()->count(10)->has(
            \App\Models\Blog::factory()->count(10)
                ->has(\App\Models\Post::factory()->count(10)->has(Comment::factory()->count(10)))
        )->create();
    }
}

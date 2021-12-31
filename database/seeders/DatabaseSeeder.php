<?php

namespace Database\Seeders;

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
        // $this->call(User::class);
        \App\Models\User::factory(1)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Post::factory(10)->create();
        \App\Models\Comment::factory(50)->create();
    }
}

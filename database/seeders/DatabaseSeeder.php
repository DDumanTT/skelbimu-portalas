<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Message;
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
        User::factory()->count(5)->has(Post::factory()->count(3))->create();
        Message::factory()->count(20)->create();
    }
}

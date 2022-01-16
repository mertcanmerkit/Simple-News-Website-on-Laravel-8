<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\NewsContent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Mertcan Merkit',
            'type' => 'admin',
            'email' => 'mertcanmerkit@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory(10)->create();
        \App\Models\NewsContent::factory(10)->create();
        \App\Models\Comment::factory(50)->create();


    }
}

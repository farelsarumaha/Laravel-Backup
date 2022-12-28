<?php

namespace Database\Seeders;
use Illuminate\Support\Str;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        User::factory(40)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'first_name' => 'Galaxy',
            'last_name' => 'Network',
            'email' => 'galaxynetwork@mail.com',
            'gender' => 'Pria',
            'position' => 'Developer',
            'title' => 'Owner',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password' => bcrypt('galaxynetwork'),
        ]);
    }
}

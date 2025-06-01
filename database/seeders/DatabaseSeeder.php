<?php

namespace Database\Seeders;

use App\Models\Api\v1\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'user@mail.com',
        // ]);

        User::create([
            'name' => 'User',
            'email' => 'user@mail.com',
            'password' => Hash::make('12345678')
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'root Admin ',
            'email' => 'root@admin.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Editor User',
            'email' => 'editor@admin.com',
            'password' => Hash::make('12345678'),
            'role' => 'editor',
        ]);
    }
}

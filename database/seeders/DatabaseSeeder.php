<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User biasa
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // User admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'), // Ganti password sesuai kebutuhan
            'role' => 'admin', // Pastikan kolom 'role' ada di tabel users
        ]);
    }
}

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
            'name' => 'Dafnal',
            'email' => 'dafnal12@gmail.com',
            'password' => Hash::make('Dafqwe12'),
            'role' => 'user',
            'status' => 'Aktif', // tambahkan ini
        ]);

        // User admin
        User::factory()->create([
            'name' => 'Zavi',
            'email' => 'zavi23@gmail.com',
            'password' => Hash::make('ZaviBE123'),
            'role' => 'admin',
            'status' => 'Aktif', // tambahkan ini
        ]);

        // User admin tambahan sesuai permintaan
        User::factory()->create([
            'name' => 'Andalas Wheels',
            'email' => 'andalaswheels@gmail.com',
            'password' => Hash::make('wheels12'),
            'role' => 'admin',
            'status' => 'Aktif', // tambahkan ini
        ]);
    }
}

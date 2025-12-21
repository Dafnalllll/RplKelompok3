<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Matic'],
            ['name' => 'Matic Premium'],
            ['name' => 'Sport Matic'],
            ['name' => 'Hybrid'],
            ['name' => 'Bebek'],
            ['name' => 'Manual'],
        ]);
    }
}

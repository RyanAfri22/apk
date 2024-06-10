<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('insurance')->insert([
            'name' => 'Insurance 1',
            'cost' => 50000,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('insurance')->insert([
            'name' => 'Insurance 2',
            'cost' => 60000,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

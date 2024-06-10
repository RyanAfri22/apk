<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accounts')->insert([
            [
                'user_id' => 1,
                'account_number' => '1234567890',
                'account_type' => 'tabungan',
                'balance' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'account_number' => '1234567891',
                'account_type' => 'tabungan',
                'balance' => 200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'account_number' => '1234567892',
                'account_type' => 'tabungan',
                'balance' => 300000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

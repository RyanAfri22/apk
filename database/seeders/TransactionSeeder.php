<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transactions')->insert([
            [
                'sender_account_id' => 1,
                'receiver_name' => 'John Doe',
                'receiver_account_number' => '1234567890123456',
                'amount' => 150000,
                'note' => 'Payment for rent',
                // 'status' => 'Completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sender_account_id' => 2,
                'receiver_name' => 'Jane Doe',
                'receiver_account_number' => '1234567890123457',
                'amount' => 200000,
                'note' => 'Payment for food',
                // 'status' => 'Completed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

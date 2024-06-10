<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InsurancePaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('insurance_payments')->insert([
            [
                'account_id' => 1,
                'insurance_id' => 1,
                'policy_number' => 'POL123456',
                'amount' => 100000,
                // 'due_date' => '2024-07-01',
                // 'payment_date' => null,
                // 'status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'account_id' => 2,
                'insurance_id' => 2,
                'policy_number' => 'POL123457',
                'amount' => 150000,
                // 'due_date' => '2024-07-15',
                // 'payment_date' => '2024-06-01',
                // 'status' => 'Paid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\TransactionStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TransactionStatus::create([
            'status' => 'pending',
        ]);
        TransactionStatus::create([
            'status' => 'paid',
        ]);
        TransactionStatus::create([
            'status' => 'failed',
        ]);
    }
}

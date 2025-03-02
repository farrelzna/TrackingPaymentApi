<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentMethodSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('payment_methods')->insert([
            ['id' => Str::uuid(), 'name' => 'Credit Card', 'description' => 'Pembayaran via kartu kredit'],
            ['id' => Str::uuid(), 'name' => 'E-Wallet', 'description' => 'Pembayaran via e-wallet'],
            ['id' => Str::uuid(), 'name' => 'Bank Transfer', 'description' => 'Pembayaran via transfer bank'],
        ]);
    }
}

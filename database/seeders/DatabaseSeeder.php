<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\PaymentMethod;
use App\Models\TransactionStatus;
use App\Models\Transaction;
use App\Models\Notification;
use App\Models\WebhookLog;
use App\Models\Refund;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Matikan foreign key checks sementara untuk bersihin data
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    
        // Bersihkan data tabel yang tergantung dulu
        Transaction::truncate();
        Notification::truncate();
        WebhookLog::truncate();
        Refund::truncate();
    
        // Baru bersihin master tabel
        TransactionStatus::truncate();
        PaymentMethod::truncate();
        User::truncate();
    
        // Reset auto-increment ke 1
        DB::statement('ALTER TABLE transactions AUTO_INCREMENT = 1;');
        DB::statement('ALTER TABLE notifications AUTO_INCREMENT = 1;');
        DB::statement('ALTER TABLE webhook_logs AUTO_INCREMENT = 1;');
        DB::statement('ALTER TABLE refunds AUTO_INCREMENT = 1;');
        DB::statement('ALTER TABLE transaction_status AUTO_INCREMENT = 1;');
        DB::statement('ALTER TABLE payment_methods AUTO_INCREMENT = 1;');
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1;');
    
        // Nyalain lagi foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    
        // Seed status transaksi tanpa risiko duplikat
        TransactionStatus::firstOrCreate(['status' => 'pending']);
        TransactionStatus::firstOrCreate(['status' => 'paid']);
        TransactionStatus::firstOrCreate(['status' => 'failed']);
    
        // Seed user, metode pembayaran, dan transaksi
        User::factory(5)->create();
        PaymentMethod::factory(3)->create();
        Transaction::factory(10)->create();
    }
    
}

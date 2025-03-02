<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\User;
use App\Models\PaymentMethod;
use App\Models\TransactionStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'user_id' => User::factory(),
            'payment_method_id' => PaymentMethod::factory(),
            'status_id' => TransactionStatus::factory(),
            'transaction_number' => 'TRX-' . Str::upper(Str::random(10)),
            'amount' => $this->faker->randomFloat(2, 10000, 1000000),
            'currency' => 'IDR',
            'payment_reference' => Str::upper(Str::random(20)),
            'transaction_date' => $this->faker->dateTime,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\TransactionStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionStatusFactory extends Factory
{
    protected $model = TransactionStatus::class;

    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement(['pending', 'paid', 'failed']),
        ];
    }
}

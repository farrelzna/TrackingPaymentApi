<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository
{
    protected $model;

    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create([
            'id' => $data['id'],
            'user_id' => $data['user_id'],
            'payment_method_id' => $data['payment_method_id'],
            'transaction_number' => $data['transaction_number'],
            'transaction_date' => $data['transaction_date'],
            'status' => $data['status'],
        ]);
    }

    public function findByTransactionNumber($transactionNumber)
    {
        return Transaction::with(['user', 'paymentMethod', 'status'])
            ->where('transaction_number', $transactionNumber)
            ->first();
    }

    public function updateStatus($transactionNumber, $status)
    {
        return Transaction::where('transaction_number', $transactionNumber)
            ->update(['status' => $status]);
    }
}

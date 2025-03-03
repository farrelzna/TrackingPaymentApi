<?php

namespace App\Repositories;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionRepository
{
    protected $model;

    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
       return Transaction::create($data);
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

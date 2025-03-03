<?php
namespace App\Services;

use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Repositories\TransactionRepository;
use Illuminate\Support\Facades\Auth;

class TransactionService
{
    protected $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function createTransaction(array $data)
    {
        return $this->transactionRepository->create([
            'user_id' => Auth::user()->id,
            'payment_method_id' => $data['payment_method_id'],
            'transaction_number' => $data['transaction_number'],
            'status' => $data['status'],
        ]);
    }

    public function getTransactionStatus($transactionNumber)
    {
        return Transaction::where('transaction_number', $transactionNumber)->first();
    }

    public function updateTransactionStatus($transactionNumber, $status)
    {
        $transaction = Transaction::where('transaction_number', $transactionNumber)->firstOrFail();
        $transaction->update(['status' => $status]);

        return $transaction;
    }
}

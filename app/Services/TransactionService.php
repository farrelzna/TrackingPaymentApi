<?php
namespace App\Services;

use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Repositories\TransactionRepository;

class TransactionService
{
    protected $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function createTransaction(array $data)
    {
        $data['id'] = Str::uuid()->toString();
        return $this->transactionRepository->create($data);
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

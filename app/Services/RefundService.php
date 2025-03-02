<?php
namespace App\Services;

use App\Repositories\RefundRepository;
use App\Repositories\TransactionRepository;
use Carbon\Carbon;

class RefundService
{
    protected $refundRepository;
    protected $transactionRepository;

    public function __construct(RefundRepository $refundRepository, TransactionRepository $transactionRepository)
    {
        $this->refundRepository = $refundRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function processRefund(string $transactionNumber, float $amount, string $reason)
    {
        // Buat data refund
        $this->refundRepository->create([
            'transaction_number' => $transactionNumber,
            'refund_amount' => $amount,
            'reason' => $reason,
            'refunded_at' => Carbon::now(),
        ]);

        // Update status transaksi jadi refunded
        $this->transactionRepository->updateStatus($transactionNumber, 'refunded');

        return true;
    }
}

<?php
namespace App\Services;

use App\Repositories\TransactionRepository;
use App\Repositories\WebhookLogRepository;

class WebhookService
{
    protected $transactionRepository;
    protected $webhookLogRepository;

    public function __construct(
        TransactionRepository $transactionRepository,
        WebhookLogRepository $webhookLogRepository
    ) {
        $this->transactionRepository = $transactionRepository;
        $this->webhookLogRepository = $webhookLogRepository;
    }

    public function handleWebhook(array $data)
    {
        // Simpan log webhook
        $this->webhookLogRepository->create([
            'transaction_number' => $data['transaction_number'] ?? null,
            'event_type' => $data['event_type'],
            'payload' => $data,
        ]);

        // Update status transaksi kalau ada nomor transaksi
        if (isset($data['transaction_number'], $data['status'])) {
            $this->transactionRepository->updateStatus($data['transaction_number'], $data['status']);
        }

        return true;
    }
}

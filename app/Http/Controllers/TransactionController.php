<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TransactionService;
use App\Http\Requests\CreateTransactionRequest;
use App\Http\Resources\TransactionResource;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    // Buat Transaksi Baru
    public function store(CreateTransactionRequest $request)
    {
        $transaction = $this->transactionService->createTransaction($request->getValidatedData());
    
        return response()->json([
        'message' => 'Transaksi berhasil dibuat',
            'data' => $transaction,
        ], 201);
    }

    public function getStatus($transactionNumber)
    {
        $transaction = $this->transactionService->getTransactionStatus($transactionNumber);

        if (!$transaction) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        return response()->json([
            'transaction_number' => $transaction->transaction_number,
            'status' => $transaction->status,
        ]);
    }

    public function updateStatus($transactionNumber, $status)
    {
        $transaction = $this->transactionService->updateTransactionStatus($transactionNumber, $status);

        return response()->json([
            'message' => 'Status transaksi berhasil diperbarui',
            'data' => $transaction,
        ]);
    }
}

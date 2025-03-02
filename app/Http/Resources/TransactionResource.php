<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'transaction_number' => $this->transaction_number,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'status' => $this->status->status,
            'payment_method' => $this->paymentMethod->name,
            'transaction_date' => $this->transaction_date,
            'payment_reference' => $this->payment_reference,
            'user' => [
                'name' => $this->user->name,
                'email' => $this->user->email,
            ],
        ];
    }
}

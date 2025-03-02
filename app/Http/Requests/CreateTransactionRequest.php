<?php
namespace App\Http\Requests;

use Illuminate\Http\Request;

class CreateTransactionRequest extends Request
{
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'transaction_number' => 'required|string|unique:transactions,transaction_number',
            'transaction_date' => 'required|date',
            'status' => 'required|string|in:pending,paid,failed',
        ];
    }

    public function getValidatedData()
    {
        return $this->only([
            'user_id',
            'payment_method_id',
            'transaction_number',
            'transaction_date',
            'status',
        ]);
    }
}

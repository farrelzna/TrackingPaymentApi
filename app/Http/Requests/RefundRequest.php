<?php
namespace App\Http\Requests;

use Illuminate\Http\Request;

class RefundRequest extends Request
{
    public function rules()
    {
        return [
            'transaction_number' => 'required|string|exists:transactions,transaction_number',
            'refund_amount' => 'required|numeric|min:0.01',
            'reason' => 'required|string|max:255',
        ];
    }
}

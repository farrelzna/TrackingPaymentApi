<?php

namespace App\Http\Requests;

use Illuminate\Validation\Factory;

class CreateTransactionRequest
{
    public static function validate($request)
    {
        $rules = [
            'user_id' => 'required',
            'payment_method_id' => 'required',
            'transaction_number' => 'required',
            'amount' => 'required',
            'currency' => 'required',
            'status_id' => 'required',
        ];

        $validator = app(Factory::class)->make($request->all(), $rules);

        if ($validator->fails()) {
            response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 400)->send();
            exit();
        }

        return $validator->validated();
    }
}

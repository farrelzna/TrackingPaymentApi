<?php
namespace App\Http\Controllers;

use App\Http\Requests\RefundRequest;
use App\Services\RefundService;
use Illuminate\Http\JsonResponse;

class RefundController extends Controller
{
    protected $refundService;

    public function __construct(RefundService $refundService)
    {
        $this->refundService = $refundService;
    }

    public function refund(RefundRequest $request): JsonResponse
    {
        $validated = $request->all();

        $this->refundService->processRefund(
            $validated['transaction_number'],
            $validated['amount'],
            $validated['reason']
        );

        return response()->json([
            'message' => 'Refund berhasil diproses',
        ], 200);
    }
}

<?php
namespace App\Http\Controllers;

use App\Services\WebhookService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class WebhookController extends Controller
{
    protected $webhookService;

    public function __construct(WebhookService $webhookService)
    {
        $this->webhookService = $webhookService;
    }

    public function handle(Request $request): JsonResponse
    {
        $data = $request->all();

        if (empty($data['transaction_number']) || empty($data['status'])) {
            return response()->json([
                'message' => 'Payload tidak valid',
            ], 400);
        }

        $this->webhookService->handleWebhook($data);

        return response()->json([
            'message' => 'Webhook diterima dan diproses',
        ], 200);
    }
}

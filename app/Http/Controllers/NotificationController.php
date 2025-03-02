<?php
namespace App\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function getUserNotifications($userId)
    {
        $notifications = $this->notificationService->getUserNotifications($userId);

        return response()->json($notifications);
    }
}

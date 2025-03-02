<?php
namespace App\Services;

use App\Repositories\NotificationRepository;

class NotificationService
{
    protected $notificationRepository;

    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    public function sendNotification($userId, $title, $message)
    {
        return $this->notificationRepository->create([
            'user_id' => $userId,
            'title' => $title,
            'message' => $message,
        ]);
    }
}

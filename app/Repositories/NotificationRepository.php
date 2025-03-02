<?php
namespace App\Repositories;

use App\Models\Notification;

class NotificationRepository
{
    public function create(array $data)
    {
        return Notification::create($data);
    }

    public function getUserNotifications($userId)
    {
        return Notification::where('user_id', $userId)->get();
    }
}

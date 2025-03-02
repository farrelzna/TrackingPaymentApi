<?php
namespace App\Repositories;

use App\Models\WebhookLog;

class WebhookLogRepository
{
    public function create(array $data)
    {
        return WebhookLog::create($data);
    }
}

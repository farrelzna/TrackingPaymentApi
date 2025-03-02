<?php
namespace App\Repositories;

use App\Models\Refund;

class RefundRepository
{
    public function create(array $data)
    {
        return Refund::create($data);
    }
}

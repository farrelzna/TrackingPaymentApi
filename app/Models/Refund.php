<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Refund extends Model
{
    use HasFactory, SoftDeletes, HasUlids;

    protected $table = 'refunds';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'transaction_id', 'amount', 'refund_method', 'reason', 'status', 'processed_at'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}

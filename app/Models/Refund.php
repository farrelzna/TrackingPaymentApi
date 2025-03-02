<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Refund extends Model
{
    use HasFactory, HasUlids;

    protected $table = 'refunds';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'transaction_number', 'refund_amount', 'reason', 'refunded_at',
    ];
    protected $dates = ['refunded_at'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}

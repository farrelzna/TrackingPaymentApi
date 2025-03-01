<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, SoftDeletes, HasUlids;

    protected $table = 'transactions';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'transaction_id', 'user_id', 'payment_method_id', 'amount',
        'currency', 'status_id', 'payment_reference', 'expired_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function status()
    {
        return $this->belongsTo(TransactionStatus::class, 'status_id');
    }

    public function refunds()
    {
        return $this->hasOne(Refund::class);
    }
}

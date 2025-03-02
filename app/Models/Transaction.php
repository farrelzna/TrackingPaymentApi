<?php

namespace App\Models;
    
use App\Models\WebhookLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, SoftDeletes, HasUlids;

    protected $table = 'transactions';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'user_id',
        'payment_method_id',
        'transaction_number',
        'transaction_date',
        'status',
    ];

    protected $casts = [
        'id' => 'string',
        'transaction_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function status()
    {
        return $this->belongsTo(TransactionStatus::class, 'status_id');
    }

    public function webhookLog()
    {
        return $this->hasOne(WebhookLog::class, 'transaction_id');
    }

    public function refund()
    {
        return $this->hasOne(Refund::class, 'transaction_id');
    }
}

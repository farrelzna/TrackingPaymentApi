<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionStatus extends Model
{
    use HasFactory, SoftDeletes, HasUlids;

    protected $table = 'transaction_status';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'status', 'code'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}

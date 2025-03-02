<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionStatus extends Model
{
    use HasFactory;
    protected $table = 'transaction_status';

    protected $fillable = ['status'];
    public $timestamps = true;

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'status_id');
    }
}

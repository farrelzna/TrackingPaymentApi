<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentMethod extends Model
{
    use HasFactory, SoftDeletes, HasUlids;

    protected $table = 'payment_methods';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name', 'description'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}

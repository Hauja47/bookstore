<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_type_id',
        'receiver_id',
        'receiver_type',
        'payment_method_id',
        'employee_id',
        'money',
        'note'
    ];

    public function receiver()
    {
        return $this->morphTo();
    }

    public function type()
    {
        return $this->belongsTo(PaymentType::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}

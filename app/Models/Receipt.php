<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    public function receiver()
    {
        return $this->morphTo();
    }

    public function employee()
    {
        return $this->belongsTo(Customer::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function type()
    {
        return $this->belongsTo(ReceiptType::class, 'receipt_type_id');
    }
}

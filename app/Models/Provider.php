<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    public function goodsReceipt()
    {
        return $this->hasMany(GoodsReceipt::class);
    }

    public function receipts()
    {
        return $this->morphMany(Receipt::class, 'receiver');
    }

    public function paymentReceiver()
    {
        return $this->morphMany(Payment::class, 'receiver');
    }
}

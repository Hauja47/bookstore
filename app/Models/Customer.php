<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
        'address',
        'debt'
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function returnGoodsReceipts()
    {
        return $this->hasMany(ReturnGoodsReceipt::class);
    }

    public function receipts()
    {
        return $this->morphMany(Receipt::class, 'giver');
    }

    public function payments()
    {
        return $this->morphMany(Payment::class, 'receiver');
    }
}

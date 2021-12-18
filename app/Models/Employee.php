<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'photo',
        'phone_number',
        'email',
        'address',
        'is_working',
        'salary',
        'user_id',
        'created_at'
    ];

    public function goodsReceipts()
    {
        return $this->hasMany(GoodsReceipt::class);
    }

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
        return $this->hasMany(Receipt::class);
    }

    public function receiptGiver()
    {
        return $this->morphMany(Receipt::class, 'giver');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function paymentReceiver()
    {
        return $this->morphMany(Payment::class, 'receiver');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

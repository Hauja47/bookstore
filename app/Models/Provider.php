<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'address'
    ];

    public function goodsReceipt()
    {
        return $this->hasMany(GoodsReceipt::class);
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

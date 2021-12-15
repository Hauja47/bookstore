<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodsReceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'provider_id',
        'total_price'
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function details()
    {
        return $this->hasMany(GoodsReceiptDetail::class, 'goods_receipt_id');
    }

    public function payment()
    {
        return $this->morphOne(Payment::class, 'payable');
    }
}

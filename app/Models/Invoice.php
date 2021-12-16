<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'employee_id',
        'total',
        'paid',
        'balance'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function details()
    {
        return $this->hasMany(InvoiceDetail::class, 'invoice_id');
    }

    // public function returnGoodsReceipt()
    // {
    //     return $this->hasMany(ReturnGoodsReceipt::class);
    // }

    public function receipt()
    {
        return $this->hasOne(Receipt::class);
    }
}

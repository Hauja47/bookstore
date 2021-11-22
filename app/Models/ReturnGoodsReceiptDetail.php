<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnGoodsReceiptDetail extends Model
{
    use HasFactory;

    public function returnGoodsReceipts()
    {
        return $this->belongsTo(ReturnGoodsReceipt::class);
    }

    public function invoiceDetail()
    {
        return $this->belongsTo(InvoiceDetail::class);
    }


    public function product()
    {
        return $this->hasOneThrough(Product::class, InvoiceDetail::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnGoodsReceiptDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'return_goods_receipt_id',
        'invoice_detail_id',
        'product_id',
        'number',
        'cost',
        'total'
    ];

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

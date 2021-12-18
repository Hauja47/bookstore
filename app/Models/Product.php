<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'productable_id',
        'productable_type',
        // 'product_type_id',
        'brand_id',
        'version',
        'photo',
        'in_stock',
        'price'
    ];

    public function productable()
    {
        return $this->morphTo();
    }

    // public function type()
    // {
    //     return $this->belongsTo(ProductType::class, 'product_type_id');
    // }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function invoices()
    {
        return $this->hasManyThrough(Invoice::class, InvoiceDetail::class);
    }

    public function goodsReceipt()
    {
        return $this->hasManyThrough(GoodsReceipt::class, GoodsReceiptDetail::class);
    }

    public function goodsReceiptDetails()
    {
        return $this->hasMany(GoodsReceiptDetail::class);
    }
}

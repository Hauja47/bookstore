<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stationery extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'slug',
        'material',
        'color',
        'origin',
    ];

    public function product()
    {
        return $this->morphOne(Product::class, 'productable');
    }
}

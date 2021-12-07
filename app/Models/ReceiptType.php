<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function receipt()
    {
        return $this->hasMany(Receipt::class);
    }
}

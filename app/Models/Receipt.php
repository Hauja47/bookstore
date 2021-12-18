<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'receipt_type_id',
        'giver_type',
        'giver_id',
        // 'payment_method_id',
        'employee_id',
        'invoice_id',
        'money',
        'can_edit_note',
        'can_delete',
        'note'
    ];

    public function giver()
    {
        return $this->morphTo();
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function type()
    {
        return $this->belongsTo(ReceiptType::class, 'receipt_type_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}

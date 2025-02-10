<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceOther extends Model
{
    use HasFactory;

    protected $fillable = [

        'invoice_id',
        'sales_order_id',
        'polds_date_id',
        'quantity',

    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'id', 'invoice_id')->with('additionals', 'discounts', 'others');
    }




}

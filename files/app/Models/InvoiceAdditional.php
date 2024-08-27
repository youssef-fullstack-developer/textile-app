<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceAdditional extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'type',
        'value',
        'percent',
    ];


    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'id', 'invoice_id')->with('additionals', 'discounts', 'others');
    }

}

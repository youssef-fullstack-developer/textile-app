<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTerms extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'payment_terms_for',
        'days',
        'interest',
        'advance',
        'status'
    ];

    public function payment_type()
    {
        return $this->hasOne(PaymentTypes::class, 'id', 'payment_terms_for');
    }
}

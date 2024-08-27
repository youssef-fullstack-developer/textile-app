<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryTerms extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'delivery_for',
        'status'
    ];
}

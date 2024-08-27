<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomesticBuyerRepresentative extends Model
{
    use HasFactory;

    protected $table = 'domestic_buyer_representatives';

    protected $fillable = [
        'buyer_id',
        'representative_name',
        'representative_phone'
    ];
}

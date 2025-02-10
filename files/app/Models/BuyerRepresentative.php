<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerRepresentative extends Model
{
    use HasFactory;

    protected $table = 'buyer_representatives';

    protected $fillable = [
        'buyer_id',
        'representative_name',
        'representative_phone'
    ];
}

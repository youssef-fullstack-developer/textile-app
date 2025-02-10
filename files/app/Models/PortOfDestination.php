<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortOfDestination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'state',
        'code',
        'description',
        'city',
        'pin',
        'status'
    ];
}

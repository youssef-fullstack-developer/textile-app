<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UOM extends Model
{
    use HasFactory;

    protected $table = "uom";

    protected $fillable = [
        'code',
        'type',
        'to_meter',
        'description',
        'status'
    ];


}

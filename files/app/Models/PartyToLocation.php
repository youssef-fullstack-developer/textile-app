<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartyToLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status'
    ];
}

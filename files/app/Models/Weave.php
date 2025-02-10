<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weave extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'no_of_heald_frame',
        'status',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ply extends Model
{
    use HasFactory;

    protected $table = 'ply';

    protected $fillable = [
        'ply',
        'status'
    ];
}

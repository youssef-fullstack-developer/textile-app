<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selvedge extends Model
{
    use HasFactory;

    protected $table = 'selvedge';

    protected $fillable = [
        'name',
        'catch_cord_ends',
        'reed_count',
        'selvedge_width',
        'dents',
        'ends_per_dent',
        'extra_ends',
        'selvedge_ends',
        'weave_id',
        'ends_per_heild',
        'status',
        'ends_per_wire',
    ];
}

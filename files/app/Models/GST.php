<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GST extends Model
{
    use HasFactory;

    protected $table = 'g_s_t_s';

    protected $fillable = [
        'gst_type',
        'igst',
        'sgst',
        'cgst',
        'status',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YarnCountRateContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'costing_id',
        'is_warp',
        'is_weft',
        'count',
        'rate_per_kg',
        'yarn_dyeing',
        'rate_incl_gst',
        'gst',
        'content',
        'yarn_type',
        'mill',
        'epi_on_loom',
        'ppi'
    ];
}

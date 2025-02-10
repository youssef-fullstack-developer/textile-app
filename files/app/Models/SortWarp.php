<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SortWarp extends Model
{
    use HasFactory;

    protected $table = "sort_warp";

    protected $fillable = [
        'sort',
        'warp_pattern',
        'warp_material',
        'warp_shrinkage',
        'warp_total_ends',
        'warp_grams_meters'
    ];

    public function material()
    {
        return $this->hasOne(Yarn::class, 'id', 'warp_material')->with('plys', 'counts');
    }
}

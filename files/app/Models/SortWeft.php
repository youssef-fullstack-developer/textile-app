<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SortWeft extends Model
{
    use HasFactory;

    protected $table = 'sort_weft';

    protected $fillable = [
        'sort',
        'weft_pattern',
        'weft_material',
        'weft_shrinkage',
        'weft_picks',
        'weft_grams_meters'
    ];


    public function material()
    {
        return $this->hasOne(Yarn::class, 'id', 'weft_material')->with('plys', 'counts');
    }
}

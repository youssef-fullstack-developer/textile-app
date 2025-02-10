<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShadeWarp extends Model
{
    use HasFactory;

    protected $fillable = [
        'shade_id',
        'actual_id',
        'material_id',
    ];

    public function actual_material()
    {
        return $this->hasOne(SortWarp::class, 'id', 'actual_id')->with('material');
    }
    public function material()
    {
        return $this->hasOne(SortWarp::class, 'id', 'material_id')->with('material');
    }


}

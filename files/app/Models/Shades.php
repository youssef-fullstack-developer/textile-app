<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shades extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_sort_id',
        'actual_sort_id',
    ];

    public function parent_sort()
    {
        return $this->hasOne(Sort::class, 'id', 'parent_sort_id');
    }
    public function actual_sort()
    {
        return $this->hasOne(Sort::class, 'id', 'actual_sort_id');
    }



    public function warps()
    {
        return $this->hasMany(ShadeWarp::class, 'shade_id', 'id')->with('actual_material','material');
    }
    public function wefts()
    {
        return $this->hasMany(ShadeWeft::class, 'shade_id', 'id')->with('actual_material','material');
    }


}

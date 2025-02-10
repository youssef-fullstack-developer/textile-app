<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SortGrey extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'parent_sort_id',
        'sort_id',
        'consumption',
        'weave_id',
    ];


    public function parent_sort()
    {
        return $this->hasOne(Sort::class, 'id', 'parent_sort_id')->with('warps', 'wefts', 'get_weave', 'get_master_quality');
    }
    public function sort()
    {
        return $this->hasOne(Sort::class, 'id', 'sort_id')->with('warps', 'wefts', 'get_weave', 'get_master_quality');
    }
    public function weave()
    {
        return $this->hasOne(Weave::class, 'id', 'weave_id');
    }
}

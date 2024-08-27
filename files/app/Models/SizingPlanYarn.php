<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizingPlanYarn extends Model
{
    use HasFactory;

    protected $fillable = [
        'sizing_plan_id',
        'yarn_id',
        'sort_id',
        'sort_ends',
        'sizing_ends',
        'width',
        'parts',
        'ends_per_parts',
        'dbf',
        'weave_type_id',
        'loom_type_id',
        'meters',
        'warp_meters',
    ];

    public function sort()
    {
        return $this->hasOne(Sort::class, 'id', 'sort_id');
    }
    public function yarn()
    {
        return $this->hasOne(Yarn::class, 'id', 'yarn_id');
    }
    public function weave_type()
    {
        return $this->hasOne(WeaveTypes::class, 'id', 'weave_type_id');

    }


}

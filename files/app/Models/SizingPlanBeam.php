<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizingPlanBeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'sizing_plan_id',
        'weaver_id',
        'order_id',
        'loom_model_id',
        'loom_number_id',
        'beam_meters',
        'expected_fabric_mtrs',
        'warp_meters',
        'beam_dia',
        'loom_ched_id',
        'is_set_beam',
    ];

    public function weaver()
    {
        return $this->hasOne(Weave::class, 'id', 'weaver_id');
    }

    public function order()
    {
        return $this->hasOne(SalesOrder::class, 'id', 'order_id');
    }


}

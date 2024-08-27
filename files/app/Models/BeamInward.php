<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeamInward extends Model
{
    use HasFactory;

    protected $fillable = [
        'sizing_plan_id',
        'receive_date',
        'no_of_cones_issued',
        'warp_count_measure',
        'receipt_no',
        'dc_no',
        'vehicle_no',
    ];


    public function sizing_plan()
    {
        return $this->belongsTo(SizingPlan::class, 'id', 'sizing_plan_id');
    }

    public function details()
    {
        return $this->hasMany(BeamInwardDetail::class, 'beam_inward_id', 'id')->with('waving_contract');
    }
}

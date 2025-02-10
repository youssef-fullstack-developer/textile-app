<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizingPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_number',
        'sizing_for',
        'sizing_name_id',
        'is_sizing_order',
        'planning_date',
        'sizing_amount',
        'remarks',
        'payment_term_id',
        'machine_id',
        'merchandiser_id',
        'ref_number',
        'beam_recieve_date',
        'vendor_id',
        'actual_count_id',
        'count',
        'yarn_id',
        'mill_name_id',
        'cone_per_bag',
        'kg_per_bag',
        'weight_per_cone',
        'bottom_percent',
        'total_meter',
        'expected_meter',
        'meter_per_part',
        'no_of_bags',
        'copart_id',
        'given_meters',
        'default_meter_for_beam',
        'is_complete',
        'yarn_issue',

    ];



    public function beam_details()
    {
        return $this->hasMany(SizingPlanBeam::class, 'sizing_plan_id', 'id')->with('weaver', 'order');
    }

    public function beam_inward()
    {
        return $this->hasOne(BeamInward::class, 'sizing_plan_id', 'id')->with('details');
    }

    public function yarn_details()
    {
        return $this->hasMany(SizingPlanYarn::class, 'sizing_plan_id', 'id')->with('sort');
    }

    public function sizing_name()
    {
        return $this->hasOne(Vendors::class, 'id', 'sizing_name_id');
    }
    public function vendor()
    {
        return $this->hasOne(Vendors::class, 'id', 'vendor_id');
    }

    public function yarn()
    {
        return $this->hasOne(Yarn::class, 'id', 'yarn_id');
    }

    public function actual_count()
    {
        return $this->hasOne(Yarn::class, 'id', 'actual_count_id')->with('counts');
    }

    public function sizing_yarn_issue()
    {
        return $this->hasOne(SizingYarnIssue::class, 'sizing_plan_id', 'id')->with('details', 'sizing_plan', 'transport');
    }
    public function mill_name()
    {
        return $this->hasOne(Mill::class, 'id', 'mill_name_id');
    }


}

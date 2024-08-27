<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizingYarnIssue extends Model
{
    use HasFactory;

    protected $fillable = [
        'sizing_plan_id',
        'set_no',
        'van_no',
        'approx_value',
        'transport_id',
        'dc_no',
    ];

    public function details()
    {
        return $this->hasMany(SizingYarnIssueDetail::class, 'sizing_yarn_issue_id', 'id')->with('actual_count');
    }

    public function sizing_plan()
    {
        return $this->hasOne(SizingPlan::class, 'id', 'sizing_plan_id');
    }
    public function transport()
    {
        return $this->hasOne(Transportations::class, 'id', 'transport_id');
    }




}

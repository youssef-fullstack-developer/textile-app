<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_id',
        'piece_no',
        'inward_meters',
        'after_fold_length',
        'shortage_excess_quantity',
        'weight',
        'avg_weight',
        'measured_width_in_inches',
        'total_defect',
        'defect_point',
        'grade_id',
        'batch',
        'fent',
        'fold',
        'total_mtrs',
        'is_sample',
    ];


    public function variations()
    {
        return $this->hasMany(InspectionDetailVariation::class, 'inspection_detail_id', 'id')->with('reason', 'weaver');
    }

    public function inspection()
    {
        return $this->belongsTo(Inspection::class, 'inspection_id', 'id')->with('packing_type', 'checker', 'vendor_group');
    }

    public function grade()
    {
        return $this->hasOne(Grade::class, 'id', 'grade_id');
    }
}

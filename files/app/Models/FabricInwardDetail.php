<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricInwardDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'fabric_inward_id',
        'quality_id',
        'quality_name',
        'char',
        'piece_no',
        'net_piece_mtrs',
        'fold',
        'piece_meter',
        'weight',
        'avg_wt',
        'picks',
        'job_rate',
        'grade_id',
        'remarks',
        'is_cutpiece'
    ];


    public function fabric_inward()
    {
        return $this->belongsTo(FabricInward::class, 'fabric_inward_id', 'id')->with('po', 'vendor_group', 'location');
    }

    public function quality()
    {
        return $this->hasOne(Sort::class, 'id', 'quality_id');
    }

    public function inspection()
    {
        return $this->hasOne(Inspection::class, 'fabric_inward_detail_id', 'id')->with('details', 'packing_type', 'checker', 'vendor_group');
    }
    public function grade()
    {
        return $this->hasOne(Grade::class, 'id', 'grade_id');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobworkFabricReceiveDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobwork_fabric_receive_id',
        'quality_id',
        'char',
        'piece_no',
        'vendor_piece_number',
        'net_piece_mtrs',
        'fold',
        'piece_meter',
        'weight',
        'avg_wt',
        'picks',
        'job_rate',
        'grade',
        'remarks',
        'is_cutpiece'
    ];


    public function jobwork_fabric_receive()
    {
        return $this->belongsTo(JobworkFabricReceive::class, 'jobwork_fabric_receive_id', 'id')->with('jobwork', 'vendor', 'location', 'chk_name');
    }

    public function quality()
    {
        return $this->hasOne(Sort::class, 'id', 'quality_id');
    }

    public function inspection()
    {
        return $this->hasOne(Inspection::class, 'jobwork_fabric_receive_detail_id', 'id')->with('details', 'packing_type', 'checker', 'vendor_group');
    }


}

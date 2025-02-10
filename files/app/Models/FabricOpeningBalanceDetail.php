<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricOpeningBalanceDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'fabric_opening_balance_id',
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
        'job_work_piece_rate',
        'remarks',
        'is_cutpiece'
    ];


    public function fabric_opening_balance()
    {
        return $this->belongsTo(FabricOpeningBalance::class, 'fabric_opening_balance_id', 'id')->with('vendor_group', 'location');
    }

    public function quality()
    {
        return $this->hasOne(Sort::class, 'id', 'quality_id');
    }

    public function inspection()
    {
        return $this->hasOne(Inspection::class, 'fabric_opening_balance_detail_id', 'id')->with('details', 'packing_type', 'checker', 'vendor_group');
    }
    public function grade()
    {
        return $this->hasOne(Grade::class, 'id', 'grade_id');
    }


}

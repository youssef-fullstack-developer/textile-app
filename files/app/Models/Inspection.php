<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobwork_fabric_receive_detail_id',
        'jobwork_finished_fabric_receive_detail_id',
        'fabric_inward_detail_id',
        'fabric_opening_balance_detail_id',
        'quality_id',
        'width',
        'inspection_date',
        'epi',
        'ppi',
        'weft_count',
        'warp_count',
        'shift',
        'remark',
        'packing_type_id',
        'is_first_meter_inspection',
        'is_last_piece',
        'checker_id',
        'vendor_group_id',
    ];

    public function details()
    {
        return $this->hasMany(InspectionDetail::class, 'inspection_id', 'id')->with('variations', 'grade');
    }

    public function jobwork_fabric_receive_detail()
    {
        return $this->hasOne(JobworkFabricReceiveDetail::class, 'id', 'jobwork_fabric_receive_detail_id')->with('jobwork_fabric_receive', 'quality');
    }
    public function jobwork_finished_fabric_receive_detail()
    {
        return $this->hasOne(JobworkFinishedFabricReceiveDetail::class, 'id', 'jobwork_finished_fabric_receive_detail_id')->with('jobwork_finished_fabric_receive', 'quality');
    }
    public function fabric_inward_detail()
    {
        return $this->hasOne(FabricInwardDetail::class, 'id', 'fabric_inward_detail_id')->with('quality', 'inspection', 'grade');
    }
    public function fabric_opening_balance_detail()
    {
        return $this->hasOne(FabricOpeningBalanceDetail::class, 'id', 'fabric_opening_balance_detail_id')->with('quality', 'inspection', 'grade');
    }

    public function packing_type()
    {
        return $this->hasOne(PackingType::class, 'id', 'packing_type_id');
    }

    public function checker()
    {
        return $this->hasOne(Employe::class, 'id', 'checker_id');
    }

    public function vendor_group()
    {
        return $this->hasOne(VendorGroups::class, 'id', 'vendor_group_id');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobworkFabricReceive extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'jobwork_id',
        'pick_rate',
        'slip_no',
        'received_date',
        'location_id',
        'chk_name_id',
        'chk_no',
        'picks',
        'unit_no',
        'total_beam_inward_mtrs',
        'total_fabric_receive_ptrs',
        'balance_mtrs',
        'is_last_piece'
        ];

    public function details()
    {
        return $this->hasMany(JobworkFabricReceiveDetail::class, 'jobwork_fabric_receive_id', 'id')->with('quality', 'inspection');
    }

    public function jobwork()
    {
        return $this->hasOne(JobworkWeavingContract::class, 'id', 'jobwork_id');
    }
    public function vendor()
    {
        return $this->hasOne(Vendors::class, 'id', 'vendor_id');
    }
    public function location()
    {
        return $this->hasOne(Location::class, 'id', 'location_id');
    }
    public function chk_name()
    {
        return $this->hasOne(Bank::class, 'id', 'chk_name_id');
    }


}

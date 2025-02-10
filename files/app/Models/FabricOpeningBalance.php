<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricOpeningBalance extends Model
{
    use HasFactory;


    protected $fillable = [
        'vendor_group_id',
        'inward_no',
        'location_id',
        'received_date',
        'is_inspected',
        'calculation_from_master',
        'is_last_piece'
    ];

    public function details()
    {
        return $this->hasMany(FabricOpeningBalanceDetail::class, 'fabric_opening_balance_id', 'id')->with('quality', 'inspection', 'grade');
    }

    public function vendor_group()
    {
        return $this->hasOne(VendorGroups::class, 'id', 'vendor_group_id');
    }

    public function location()
    {
        return $this->hasOne(Location::class, 'id', 'location_id');
    }


}

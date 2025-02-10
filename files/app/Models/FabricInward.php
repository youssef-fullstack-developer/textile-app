<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricInward extends Model
{
    use HasFactory;


    protected $fillable = [
        'vendor_group_id',
        'po_id',
        'inward_no',
        'location_id',
        'received_date',
        'is_inspected',
        'is_last_piece'
    ];

    public function details()
    {
        return $this->hasMany(FabricInwardDetail::class, 'fabric_inward_id', 'id')->with('quality', 'inspection', 'grade');
    }

    public function po()
    {
        return $this->hasOne(FabricPO::class, 'id', 'po_id')->with('details','vendor_group','agent','fabric_type','so_num','payment_terms','vendor','terms_conditions','consignee','purchase_type');
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

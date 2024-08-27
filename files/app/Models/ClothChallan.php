<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClothChallan extends Model
{
    use HasFactory;

    protected $fillable = [
        'challan_date',
        'challan_type',
        'buyer_id',
        'company',
        'lr_number',
        'lr_date',
        'ewaybill_number',
        'transportation_id',
        'remarks',
        'order_id',
        'sort_id',
        'no_of_bale_roll',
        'consignee_id',
        'vehicle_number',
        'rate',
        'challan_no',
        'fabric_seconds_sales',
        'order_sort_id',
        'packing_type_id',
        'from_date',
        'to_date',
        'meter_range_id',
        'available_bales',
        'no_of_bales_rolls',
        'from_bale_id',
        'to_bale_id',


    ];


//    public function details()
//    {
//        return $this->hasMany(ClothChallanDetail::class, 'cloth_challan_id', 'id')->with('order_sort', 'packing_type', 'from_bale', 'to_bale');
//    }

    public function buyer()
    {
        return $this->hasOne(Buyers::class, 'id', 'buyer_id');
    }

    public function transportation()
    {
        return $this->hasOne(Transportations::class, 'id', 'transportation_id');
    }

    public function order()
    {
        return $this->hasOne(SalesOrderDetail::class, 'id', 'order_id')->with('sales_order','yarn_certification_types','sales_order_sub_details','quality');
    }

    public function sort()
    {
        return $this->hasOne(Sort::class, 'id', 'sort_id');
    }

    public function consignee()
    {
        return $this->hasOne(Vendors::class, 'id', 'consignee_id');
    }
    public function order_sort()
    {
        return $this->hasOne(Sort::class, 'id', 'order_sort_id');
    }
    public function packing_type()
    {
        return $this->hasOne(PackingType::class, 'id', 'packing_type_id');
    }
    public function from_bale()
    {
        return $this->hasOne(BalePacking::class, 'id', 'from_bale_id');
    }
    public function to_bale()
    {
        return $this->hasOne(BalePacking::class, 'id', 'to_bale_id');
    }
    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'cloth_challan_id', 'id');
    }
}

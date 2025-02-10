<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClothChallanDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'cloth_challan_id',
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


    public function cloth_challan()
    {
        return $this->belongsTo(ClothChallan::class, 'cloth_challan_id', 'id')->with('buyer','transportation','order','sort','consignee');
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
}

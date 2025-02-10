<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalePacking extends Model
{
    use HasFactory;

    protected $fillable = [
        'packing_date',
        'packing_type_id',
        'order_type',
        'buyer_id',
        'order_id',
        'bale_length',
        'quality_id',
        'yard_id',
        'tare_weight',
        'gross_weight',
        'location',
        'company',
        'bale_roll_number',
        'bale_roll_manual_no',
        'loom_type_id',
        'consignee_id',
        'remarks',
        'conversion',
        'by_location',
        'grade_id',
        'rack_location',
        'fabric_seconds_sales',
        'piece_no_to_scan',

    ];


    public function details()
    {
        return $this->hasMany(BalePackingDetail::class, 'bale_packing_id', 'id');
    }

    public function packing_type()
    {
        return $this->hasOne(PackingType::class, 'id', 'packing_type_id');
    }
    public function buyer()
    {
        return $this->hasOne(Buyers::class, 'id', 'buyer_id');
    }
    public function order()
    {
        return $this->hasOne(SalesOrder::class, 'id', 'order_id');
    }
    public function quality()
    {
        return $this->hasOne(Sort::class, 'id', 'quality_id');
    }
    public function loom_type()
    {
        return $this->hasOne(LoomTypes::class, 'id', 'loom_type_id');
    }
    public function consignee()
    {
        return $this->hasOne(Vendors::class, 'id', 'consignee_id');
    }
    public function grade()
    {
        return $this->hasOne(Grade::class, 'id', 'grade_id');
    }

}

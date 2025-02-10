<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YarnOpeningBalance extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'transportation_details',
        'vendor_group_id',
        'gate_pass_no',
        'gate_pass_date',
        'taxable_amount',
        'location_id',
        'stock_type_id',
        //'purchase_order_id',
        //'agent_id',
        //'sale_order_id',
        //'vehicle_number',
        //'receipt_number',
        //'remarks',
        //'lorry_no',
        //'lorry_weight',
        //'lorry_empty_weight',
        'is_jobwork_order',
    ];

    public function details()
    {
        return $this->hasMany(YarnOpeningBalanceDetail::class, 'yarn_opening_balance_id', 'id')->with('lots','yarn','mill');
    }
    public function vendor_group()
    {
        return $this->hasOne(VendorGroups::class, 'id', 'vendor_group_id');
    }
    public function location()
    {
        return $this->hasOne(Location::class, 'id', 'location_id');
    }
    public function stock_type()
    {
        return $this->hasOne(StockType::class, 'id', 'stock_type_id');
    }
//    public function purchase_order()
//    {
//        return $this->hasOne(YarnPO::class, 'id', 'purchase_order_id');
//    }
//    public function sale_order()
//    {
//        return $this->hasOne(SalesOrder::class, 'id', 'sale_order_id');
//    }
}

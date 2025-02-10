<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gst',
        'country_id',
        'state_id',
        'address_1',
        'address_2',
        'address_3',
        'city_id',
        'phone',
        'buyer_pincode',
        'email',
        'buyer_no',
        'buyer_code',
        'bank',
        'bank_country_id',
        'bank_state_id',
        'state_code',
        'bank_address',
        'pincode',
        'bank_city_id',
        'is_active',
        'credit_limit',
        'interest',
        'gst_type',
        'consignee_as_buyer',
        'account_group',
        'vendor_group_id',
        'tax_id',
        'pan',
        'port_landing',
        'port_destination',
        'currency',
        'is_self',
    ];

    public function representatives()
    {
        return $this->hasMany(BuyerRepresentative::class, 'buyer_id', 'id');
    }
    public function consignee_details()
    {
        return $this->hasMany(BuyerConsigneeDetail::class, 'buyer_id', 'id');
    }
    public function consignees()
    {
        return $this->hasMany(Consignee::class, 'buyer_id', 'id');
    }

    public function sizing_plans()
    {
        return $this->hasMany(SizingPlan::class, 'sizing_name_id', 'id');
    }

    public function country(){
         return $this->belongsTo(Countries::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function port_of_landing(){
        return $this->hasOne(Port::class,  'id', 'port_landing');
    }
    public function port_of_destination(){
        return $this->hasOne(PortOfDestination::class,  'id', 'port_destination');
    }
}

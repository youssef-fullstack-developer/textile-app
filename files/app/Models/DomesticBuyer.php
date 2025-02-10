<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomesticBuyer extends Model
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
        'pan',
        'tcs_applied',
        'tcs_declaration',
        'collectee_type',
        'market',
        'sector',
        'is_self',
    ];

    public function representatives()
    {
        return $this->hasMany(DomesticBuyerRepresentative::class, 'buyer_id', 'id');
    }

    public function country(){
        return $this->belongsTo(Countries::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
}

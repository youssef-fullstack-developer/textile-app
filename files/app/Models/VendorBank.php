<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorBank extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'bank_id',
        'account_number',
        'country_id',
        'state_id',
        'city_id',
        'address',
        'pin_code',
        'phone_number',
        'ifsc_code',
    ];

    public function vendor() {
        return $this->hasOne(Vendors::class, 'id','vendor_id');
    }
    public function bank() {
        return $this->hasOne(Bank::class, 'id','bank_id');
    }
    public function country() {
        return $this->hasOne(Countries::class, 'id','country_id');
    }
    public function state() {
        return $this->hasOne(State::class, 'id','state_id');
    }
    public function city() {
        return $this->hasOne(City::class, 'id','city_id');
    }
}

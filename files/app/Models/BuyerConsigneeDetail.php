<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyerConsigneeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'name',
        'state_id',
        'city_id',
        'address',
        'gstn',
        'pin_code',
        'phone_number',
        'email_id',
        'pan_no',
        'country_id',
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyers::class, 'id', 'buyer_id');
    }

    public function country()
    {
        return $this->hasOne(Countries::class );
    }

    public function state()
    {
        return $this->hasOne(State::class);
    }
    public function city()
    {
        return $this->hasOne(City::class);
    }

}

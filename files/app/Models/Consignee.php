<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consignee extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'name',
        'state_id',
        'city_id',
        'address',
        'gstn',
        'pin',
        'contact',
        'pan',
        'active'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function buyer()
    {
        return $this->belongsTo(Buyers::class, 'buyer_id', 'id');
    }
}

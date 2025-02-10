<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YarnOpeningBalanceDetail extends Model
{
    use HasFactory;


    protected $fillable = [
        'yarn_opening_balance_id',
        'yarn_id',
        'mill_id',
        'total_no_of_bags',
        'kgs_per_bag',
        'cones_per_bag',
        'total_cones',
        'total_kgs',
        'rate_per_kg',
        'basic_amount',
        'gross_weight',
    ];

    public function yarn_opening_balance()
    {
        return $this->hasOne(YarnOpeningBalance::class,  'id', 'yarn_opening_balance_id')->with('vendor_group','location','stock_type');
    }

    public function lots()
    {
        return $this->hasMany(YarnOpeningBalanceDetailLot::class, 'yarn_opening_balance_detail_id', 'id')->with('cone_tip_color');
    }
    public function yarn()
    {
        return $this->hasOne(Yarn::class, 'id', 'yarn_id');
    }

    public function mill()
    {
        return $this->hasOne(Mill::class, 'id', 'mill_id');
    }


}

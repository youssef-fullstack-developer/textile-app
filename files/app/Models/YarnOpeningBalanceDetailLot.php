<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YarnOpeningBalanceDetailLot extends Model
{
    use HasFactory;


    protected $fillable = [
        'yarn_opening_balance_detail_id',
        'cone_tip_color_id',
        'lot_no',
        'no_of_bags',
        'kgs_per_bag',
        'totalkgs',
        'cones_per_bag',
    ];

    public function yarn_opening_balance_detail()
    {
        return $this->belongsTo(YarnOpeningBalanceDetail::class, 'yarn_opening_balance_detail_id', 'id');
    }

    public function cone_tip_color()
    {
        return $this->hasOne(Color::class, 'id', 'cone_tip_color_id');
    }


}

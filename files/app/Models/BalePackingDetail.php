<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalePackingDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'bale_packing_id',
        'piece_number_id',
        'piece_meters',
        'location',
        'yard',
        'net_wt',
        'avg_wt',
        'glm',

    ];


    public function bale_packing()
    {
        return $this->belongsTo(BalePacking::class, 'bale_packing_id', 'id')->with('packing_type','buyer','order','quality','loom_type','consignee','grade');
    }


}

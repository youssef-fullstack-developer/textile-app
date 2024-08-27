<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeamOutwardDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'beam_outward_id',
        'weaver_id',
        'order_id',
        'beam_number',
        'yarn_id',
        'meteres',
        'width',
        'expexted_weaving_mtr',
        'reed_space',
        'picks',
        'total_ends',
    ];

    public function order()
    {
        return $this->hasOne(SalesOrder::class, 'id', 'order_id');
    }

    public function weaver()
    {
        return $this->hasOne(Weave::class, 'id', 'weaver_id');
    }

    public function yarn()
    {
        return $this->hasOne(Yarn::class, 'id', 'yarn_id');
    }
}

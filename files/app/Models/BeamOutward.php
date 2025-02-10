<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeamOutward extends Model
{
    use HasFactory;

    protected $fillable = [
        'outward_number',
        'size_id',
        'set_id',
        'sort_id',
        'outward_date',
        'vehicule_number',
        'transport',
        'hsn_code',
        'sac_code',
        'e_way_bill_no',
        'approx_value',
        'dc_no',
        'vendor_id',
        'set_close',
    ];


    public function details()
    {
        return $this->hasMany(BeamOutwardDetail::class, 'beam_outward_id', 'id')->with('order', 'weaver', 'yarn');
    }
    public function size()
    {
        return $this->hasOne(Vendors::class, 'id', 'size_id');
    }

    public function set()
    {
        return $this->hasOne(Set::class, 'id', 'set_id');
    }

    public function sort()
    {
        return $this->hasOne(Sort::class, 'id', 'sort_id');
    }

    public function vendor()
    {
        return $this->hasOne(Vendors::class, 'id', 'vendor_id');
    }
}

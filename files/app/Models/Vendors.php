<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendors extends Model
{
    use HasFactory;

    protected $table = 'vendors';
    protected $fillable = [
        'code',
        'name',
        'vendor_group_id',
        'address',
        'city_id',
        'pincode',
        'state_id',
        'gstn',
        'status'
    ];

    public function yarn_pos()
    {
        return $this->hasMany(YarnPO::class, 'vendor_id', 'id')->with('details','vendor_group','agent','certification_type','po_type','pr_num','so_num','payment_terms','vendor','terms_conditions','consignee','yarn_type');
    }

    public function get_vendor_group()
    {
        return $this->hasOne(VendorGroups::class, 'id', 'vendor_group_id');
    }

    public function get_city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
    public function get_state()
    {
        return $this->hasOne(State::class, 'id', 'state_id');
    }
}

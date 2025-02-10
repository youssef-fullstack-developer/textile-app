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
        'vendor_prefix',
        'contact_person_name',
        'contact_no',
        'landline_number',
        'email',
        'state_id',
        'city_id',
        'pincode',
        'fax',
        'gstn',
        'vendor_rating',
        'vendor_preference',
        'interest_percent',
        'gst_reg_type_id',
        'vendor_group_id',
        'pan_number',
        'account_group_id',
        'address',
        'is_tds_applicable',
        'deductee_type',
        'msme_non_msme',
        'purchase_type',
        'msme_type',
        'msme_number',
        'status'
    ];

    public function yarn_pos()
    {
        return $this->hasMany(YarnPO::class, 'vendor_id', 'id')->with('details', 'vendor_group', 'agent', 'certification_type', 'po_type', 'pr_num', 'so_num', 'payment_terms', 'vendor', 'terms_conditions', 'consignee');
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

    public function get_gst_reg_type()
    {
        return $this->hasOne(GstRegisteredType::class, 'id', 'gst_reg_type_id');
    }

    public function get_account_group()
    {
        return $this->hasOne(AccountGroup::class, 'id', 'account_group_id');
    }

    public function banks()
    {
        return $this->hasMany(VendorBank::class, 'vendor_id', 'id')->with('country','state','city');
    }
}

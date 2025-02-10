<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobworkWeavingContract extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobwork_number',
        'contract_type_id',
        'vendor_id',
        'contract_no',
        'contract_year',
        'contract_number',
        'contract_date',
        'sort_id',
        'pick_rate',
        'merchandiser_id',
        'delivery_date',
        'inspection_type_id',
        'payment_term_id',
        'wastage',
        'packing_type_id',
        'production_mtrs',
        'piece_length_80',
        'piece_length_20',
        'quality_reed',
        'quality_picks',
        'no_of_ends',
        'reed_space',
        'l_to_l',
        'selvedge_id',
        'dents',
        'ends_per_dent',
        'selvedge_ends',
        'width',
        'catch_cord_ends',
        'ends_per_wire',
    ];

    public function orders()
    {
        return $this->hasMany(JobworkWeavingContractOrders::class, 'jobwork_weaving_contract_id', 'id')->with('order');
    }
    public function wefts()
    {
        return $this->hasMany(JobworkWeavingContractWefts::class, 'jobwork_weaving_contract_id', 'id')->with('actual','material');
    }
    public function warps()
    {
        return $this->hasMany(JobworkWeavingContractWarps::class, 'jobwork_weaving_contract_id', 'id')->with('actual','material');
    }

    public function sort()
    {
        return $this->hasOne(Sort::class, 'id', 'sort_id')->with('warps', 'wefts');
    }

    public function contract_type()
    {
        return $this->hasOne(ContractType::class, 'id', 'contract_type_id');
    }

    public function vendor()
    {
        return $this->hasOne(VendorGroups::class, 'id', 'vendor_id');
    }

    public function merchandiser()
    {
        return $this->hasOne(Employe::class, 'id', 'merchandiser_id');
    }

    public function inspection_type()
    {
        return $this->hasOne(InspectionType::class, 'id', 'inspection_type_id');
    }

    public function payment_term()
    {
        return $this->hasOne(PaymentTerms::class, 'id', 'payment_term_id');
    }

    public function packing_type()
    {
        return $this->hasOne(PackingType::class, 'id', 'packing_type_id');
    }

    public function selvedge()
    {
        return $this->hasOne(Selvedge::class, 'id', 'selvedge_id');
    }

    public function beam_outward_details()
    {
        return $this->hasMany(BeamOutwardDetail::class, 'order_id', 'id');
    }

}

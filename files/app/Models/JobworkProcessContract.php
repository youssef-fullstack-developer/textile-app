<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobworkProcessContract extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_date',
        'process_id',
        'group_id',
        'vendor_id',
        'contract_number',
        'contract_date',
        'agent_id',
        'contact_person_1_id',
        'contact_person_2_id',
        'rate_per_meter',
        'delivery_date',
        'inspection_type_id',
        'payment_term_id',
        'order_mtrs',
        'transport_id',
        'delivery_location_id',
        'wastage',
        'sort_id',
        'is_opening_contract',
        'gst_type',
        'terms_condition_id',
        'remarks_1',
        'taxable_amount',
        'gst_percent',
        'igst_amount',
        'sgst_amount',
        'cgst_amount',
        'grand_total',
        'approval',
        'approval_date',
        'internal_remark',
        'customer_instruction',
        'comments',
    ];


    public function details()
    {
        return $this->hasMany(JobworkProcessContractDetail::class, 'jobwork_process_contract_id', 'id')->with('sort');
    }
    public function jobwork_process_contract_issue()
    {
        return $this->hasOne(JobworkProcessContractIssue::class, 'jobwork_process_contract_id', 'id');
    }

    public function process()
    {
        return $this->hasOne(ProcessReturn::class, 'id', 'process_id');
    }
    public function group()
    {
        return $this->hasOne(VendorGroups::class, 'id', 'group_id');
    }
    public function vendor()
    {
        return $this->hasOne(Vendors::class, 'id', 'vendor_id');
    }
    public function agent()
    {
        return $this->hasOne(Agent::class, 'id', 'agent_id');
    }
    public function contact_person_1()
    {
        return $this->hasOne(Employe::class, 'id', 'contact_person_1_id');
    }
    public function contact_person_2()
    {
        return $this->hasOne(Employe::class, 'id', 'contact_person_2_id');
    }
    public function inspection_type()
    {
        return $this->hasOne(InspectionType::class, 'id', 'inspection_type_id');
    }
    public function delivery_location()
    {
        return $this->hasOne(DeliveryTerms::class, 'id', 'delivery_location_id');
    }
    public function terms_condition()
    {
        return $this->hasOne(TermsCondition::class, 'id', 'terms_condition_id');
    }




}

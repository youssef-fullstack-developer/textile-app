<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricPO extends Model
{
    use HasFactory;

    protected $table = 'fabric_pos';

    protected $fillable = [
        'po_number',
        'po_date',
        'vendor_group_id',
        'customer_so',
        'igst',
        'cgst_sgst',
        'agent_id',
        //'manual_po_number',
        //'certification_type_id',
        'fabric_type_id',
        //'pr_num_id',
        'so_num_id',
        'payment_terms_id',
        'vendor_id',
        'terms_conditions_id',
        //'remark',
        'consignee_id',
        //'yarn_type_id',
        //'delivery_term_id',
        'purchase_type_id',
        'company',
        'is_gst_applicable',
        'approval',
        'approval_date',
        'internal_remark',
        'customer_instruction',
        'comments',
    ];

    public function details()
    {
        return $this->hasMany(FabricPoDetail::class, 'fabric_po_id', 'id')->with('yarn_certification_types','quality','unit','delivery_term');
    }
    public function vendor_group()
    {
        return $this->hasOne(VendorGroups::class, 'id', 'vendor_group_id');
    }
    public function agent()
    {
        return $this->hasOne(Agent::class, 'id', 'agent_id');
    }

//    public function certification_type()
//    {
//        return $this->hasOne(Certification::class, 'id', 'certification_type_id');
//    }

    public function fabric_type()
    {
        return $this->hasOne(FabricType::class, 'id', 'fabric_type_id');
    }

//    public function pr_num()
//    {
//        return $this->hasOne(Pr::class, 'id', 'pr_num_id');
//    }

    public function so_num()
    {
        return $this->hasOne(SalesOrder::class, 'id', 'so_num_id');
    }

    public function payment_terms()
    {
        return $this->hasOne(PaymentTerms::class, 'id', 'payment_terms_id');
    }

    public function vendor()
    {
        return $this->hasOne(Vendors::class, 'id', 'vendor_id');
    }

    public function terms_conditions()
    {
        return $this->hasOne(TermsCondition::class, 'id', 'terms_conditions_id');
    }

    public function consignee()
    {
        return $this->hasOne(Consignee::class, 'id', 'consignee_id');
    }

//    public function yarn_type()
//    {
//        return $this->hasOne(YarnType::class, 'id', 'yarn_type_id');
//    }

//    public function delivery_term()
//    {
//        return $this->hasOne(DeliveryTerms::class, 'id', 'delivery_term_id');
//    }
    public function purchase_type()
    {
        return $this->hasOne(PurchaseType::class, 'id', 'purchase_type_id');
    }

}

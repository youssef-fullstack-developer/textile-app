<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricPoDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'fabric_po_id',
//        'count_id',
//        'cones_per_bag',
//        'kg_per_bag',
//        'cone_weight',
//        'mill_name_id',
//        'no_of_bags',
        'quantity',
//        'mill_price',
        'basic_amount',
        'igst_val',
        'cgst_val',
        'sgst_val',
        'igst_amount',
        'cgst_amount',
        'sgst_amount',
        'total_amount',
        'provisional_freight',
        'mill_gst_price',
        'final_price',
        'delivery_date',
//        'csp_id',
//        'hairiness_index_h_id',
//        'count_cv_id',
//        'strenght_cv_id',
        'quality_id',
        'unit_id',
        'unit_price',
        'remark',
        'delivery_term_id',
        'inr_conversion_value',
        'curreny',
    ];

    public function fabric_po()
    {
        return $this->belongsTo(FabricPO::class, 'id', 'fabric_po_id')->with('details', 'vendor_group', 'agent', 'fabric_type', 'so_num', 'payment_terms', 'vendor', 'terms_conditions', 'consignee', 'purchase_type');
    }


    public function yarn_certification_types()
    {
        return $this->hasMany(FabricPoDetailYarnCertification::class, 'fabric_po_detail_id', 'id')->with('yarn_certification_type');
    }

    public function quality()
    {
        return $this->hasOne(Sort::class, 'id', 'quality_id');
    }

    public function unit()
    {
        return $this->hasOne(Unit::class, 'id', 'unit_id');
    }

    public function delivery_term()
    {
        return $this->hasOne(DeliveryTerms::class, 'id', 'delivery_term_id');
    }


}

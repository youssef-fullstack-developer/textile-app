<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YarnPoDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'yarn_po_id',
        'count_id',
        'cones_per_bag',
        'kg_per_bag',
        'cone_weight',
        'mill_name_id',
        'no_of_bags',
        'quantity',
        'mill_price',
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
        'delivery_date`',
        'csp_id',
        'hairiness_index_h_id',
        'count_cv_id',
        'strenght_cv_id',
        'inr_conversion_value',
        'curreny',
    ];

    public function yarn_po()
    {
        return $this->belongsTo(YarnPO::class, 'id', 'yarn_po_id')->with('details','vendor_group','agent','certification_type','po_type','pr_num','so_num','payment_terms','vendor','terms_conditions','consignee');
    }

    public function count()
    {
        return $this->hasOne(Yarn::class, 'id', 'count_id');
    }

    public function mill_name()
    {
        return $this->hasOne(Mill::class, 'id', 'mill_name_id');
    }


}

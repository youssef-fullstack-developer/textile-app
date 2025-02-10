<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
         'sales_order_id'
        ,'finished_quality_id'
        ,'weave_type_id'
        ,'first_quality_id'
        ,'selvedge_id'
        ,'unit_id'
        ,'inspection_type_id'
        ,'paper_tube_size_id'
        ,'costing_number'
        ,'hsn_code'
        ,'quantity'
        ,'rate_per_unit'
        ,'val'
        ,'frieght_charge'
        ,'surcharge'
        ,'exchange_rate'
        ,'inr_rate'
        ,'piece_length'
        ,'variation'
        ,'fold'
        ,'yarn_det'
        ,'packing_type'
        ,'buyer_sort'
        ,'sort_code'
        ,'weaving_qty'
        ,'purchase_qty'
        ,'instruction_factory'
        ,'description'
        ,'fabric_type'
        ,'currency'
        ,'yarn_require'
        ,'shrinkage'
        ,'approval'
        ,'comment'
    ];


    public function sales_order()
    {
        return $this->belongsTo(SalesOrder::class, 'sales_order_id', 'id')->with('buyer','contract_type','ship_to','user','sourcing_executive','bank','so_type','payment_terms','city', 'terms_conditions', 'invoice_type');
    }

    public function yarn_certification_types()
    {
        return $this->hasMany(SalesOrderYarnCertification::class, 'sales_order_detail_id', 'id')->with('yarn_certification_type');
    }
    public function sales_order_sub_details()
    {
        return $this->hasMany(SalesOrderSubDetail::class, 'sales_order_detail_id', 'id');
    }

    public function quality()
    {
        return $this->hasOne(Sort::class, 'id', 'first_quality_id')->with('warps','wefts');
    }
    public function finished_quality()
    {
        return $this->hasOne(Sort::class, 'id', 'finished_quality_id')->with('warps','wefts');
    }
    public function inspection_type()
    {
        return $this->hasOne(InspectionType::class, 'id', 'inspection_type_id');
    }
    public function paper_tube_size()
    {
        return $this->hasOne(PaperTubeSize::class, 'id', 'paper_tube_size_id');
    }
    public function selvedge()
    {
        return $this->hasOne(Selvedge::class, 'id', 'selvedge_id');
    }
    public function weave_type()
    {
        return $this->hasOne(WeaveTypes::class, 'id', 'weave_type_id');
    }
    public function unit()
    {
        return $this->hasOne(Unit::class, 'id', 'unit_id');
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($current_model) {
//            if ($current_model->yarn_certification_type) {
            $current_model->yarn_certification_types->delete();
            $current_model->sales_order_sub_details->delete();
//            }
        });
    }

}

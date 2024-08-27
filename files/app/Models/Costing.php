<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costing extends Model
{
    use HasFactory;

    protected $fillable = [
        'costing_number',
        'date',
        'agent_id',
        'customer_id',
        'sourcing_id',
        'weave_factor_id',
        'quality',
        'shafts',
        'marketing_executive',
        'buyer_reference',
        'is_warp_butta',
        'is_weft_butta',
        'is_warp2_sizing_count',
        'is_seersucker',
        'grey_width',
        'epi_difference',
        'meters_per_120yards',
        'warp_crimp',
        'total_ends',
        'margin_percent',
        'target_price',
        'order_quantity',
        'sizing_per_kg',
        'weaving_charges',
        'fabric_processing_cost',
        'freight_per_kg_mtr',
        'packaging_charges',
        'butta_cutting_per_mtr',
        'yarn_wastage',
        'value_loss',
        'interest_etc',
        'payment_term',
        'commission_cd',
        'remark',
        'other_cost_rate',
        'other_cost_remarks',
        'extra_remarks_if_any'
    ];


    public function yarn_count_rate_contents()
    {
        return $this->hasMany(YarnCountRateContent::class, 'costing_id', 'id');
    }

    public function agent()
    {
        return $this->hasOne(Agent::class, 'id', 'agent_id');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'agent_id');
    }

    public function sourcing()
    {
        return $this->hasOne(SourcingExecutive::class, 'id', 'agent_id');
    }

    public function weave_factor()
    {
        return $this->hasOne(WeaveFactor::class, 'id', 'agent_id');
    }


}

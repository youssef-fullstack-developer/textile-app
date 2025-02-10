<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    use HasFactory;

    protected $fillable = [
        'sales_order_details_id',
        'set_number',
        'date',
        'order_quantity',
        'plan_quantity',
        'last_set',
    ];

    public function sales_order_detail()
    {
        return $this->hasOne(SalesOrderDetail::class, 'id', 'sales_order_details_id')->with('sales_order','yarn_certification_types','sales_order_sub_details','quality','finished_quality','inspection_type','paper_tube_size','selvedge','weave_type','unit');
    }

}

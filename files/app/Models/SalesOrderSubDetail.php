<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrderSubDetail extends Model
{
    use HasFactory;

    protected $fillable = [
         'sales_order_detail_id'
        , 'fcl'
        , 'po_lds'
        , 'ex_factory_date'
        , 'actual_ex_factory_date'
        , 'lc_expire_date'
        , 'office_remark'
        , 'factory_remark'
        , 'lc_no'
        , 'lds_date'
        , 'line'
        , 'etd'
        , 'eta'
    ];

}

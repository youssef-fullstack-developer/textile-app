<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobworkWeavingContractOrders extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobwork_weaving_contract_id',
        'sales_order_detail_id',
        'planned_quantity',
    ];

    public function order()
    {
        return $this->hasOne(SalesOrder::class, 'id', 'sales_order_detail_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractTypeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_type_id',
        'contract_order_route_name',
        'contract_order_route_code',
        'show_in_ppc',
        'show_in_fabric_po',
        'show_in_warehouse',
        'bank_purpose',
    ];


}


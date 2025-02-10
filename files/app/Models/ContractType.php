<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'type',
        'status'
    ];

    public function details()
    {
        return $this->hasMany(ContractTypeDetail::class, 'contract_type_id', 'id');
    }

}


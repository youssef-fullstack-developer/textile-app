<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOrderYarnCertification extends Model
{
    use HasFactory;

    protected $fillable = [
         'sales_order_detail_id'
        , 'yarn_certification_type_id'
    ];

    public function yarn_certification_type()
    {
        return $this->hasOne(YarnCertificationType::class, 'id', 'yarn_certification_type_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FabricPoDetailYarnCertification extends Model
{
    use HasFactory;

    protected $fillable = [
         'fabric_po_detail_id'
        , 'yarn_certification_type_id'
    ];

    public function yarn_certification_type()
    {
        return $this->hasOne(YarnCertificationType::class, 'id', 'yarn_certification_type_id');
    }
}

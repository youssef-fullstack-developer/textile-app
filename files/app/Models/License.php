<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;
    protected $table = 'licences';

    protected $fillable = [
        'number',
        'type',
        'import_hsn_no',
        'date',
        'expiry_date',
        'description',
        'export_hsn_no',
        'volume',
        'uom_id',
        'value',
        'currency_type',
        'convertion_value',
        'status',
    ];

    public function get_uom()
    {
        return $this->hasOne(GroupType::class, 'id', 'uom_id');
    }

}

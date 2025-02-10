<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YarnType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'unit',
        'factor',
        'loss',
        'system',
        'code',
        'status'
    ];

    public function units()
    {
        return $this->hasOne(UOM::class, 'id', 'unit');
    }

}

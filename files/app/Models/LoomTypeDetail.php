<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoomTypeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'loom_type_id',
        'model',
        'make',
    ];


    public function loom_type()
    {
        return $this->belongsTo(LoomTypes::class, 'loom_type_id', 'id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoomTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status'
    ];

    public function details()
    {
        return $this->hasMany(LoomTypeDetail::class, 'loom_type_id', 'id');
    }

}

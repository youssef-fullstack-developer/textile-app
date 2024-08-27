<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
    use HasFactory;

    protected $fillable = [
        'count',
        'status'
    ];

    public function yarns() {
        return $this->hasMany(Yarn::class, 'count');
    }
}

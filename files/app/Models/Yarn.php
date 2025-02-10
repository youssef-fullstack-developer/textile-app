<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yarn extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'count',
        'ply',
        'filaments',
        'type',
        'unit',
        'tpm',
        'color',
        'variety',
        'reorder',
        'buy_uom',
        'blend',
        'danger',
        'is_apply',
        'conversion',
        'display_name',
        'hsn',
        'igst',
        'cgst',
        'sgst',
        'cess',
        'status'
    ];

    public function counts() {
        return $this->hasOne(Count::class, 'id','count');
    }
    public function plys() {
        return $this->hasOne(Ply::class,'id', 'ply');
    }
    public function units() {
        return $this->hasOne(Unit::class, 'id', 'unit');
    }
    public function get_variety() {
        return $this->hasOne(Variety::class, 'id', 'variety');
    }
}

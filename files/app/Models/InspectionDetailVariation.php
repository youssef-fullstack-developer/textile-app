<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionDetailVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_detail_id',
        'variation',
        'from_mtrs',
        'to_mtrs',
        'reason_id',
        'defect_points',
        'weaver_id',
    ];

    public function inspection_detail()
    {
        return $this->belongsTo(InspectionDetail::class, 'inpection_detail_id', 'id')
            ->with('inspection', 'grade');
    }

    public function reason()
    {
        return $this->hasOne(Reason::class, 'id', 'reason_id');
    }
    public function weaver()
    {
        return $this->hasOne(Employe::class, 'id', 'weaver_id');
    }



}

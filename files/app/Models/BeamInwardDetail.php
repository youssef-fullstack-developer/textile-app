<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeamInwardDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'beam_inward_id',
        'weaving_contract_id',
        'receive_metrs',
        'beam_number',
    ];


    public function beam_inward()
    {
        return $this->BelongsTo(BeamInward::class, 'id', 'beam_inward_id');
    }

    public function waving_contract()
    {
        return $this->hasOne(JobworkWeavingContract::class, 'id', 'weaving_contract_id');
    }
}

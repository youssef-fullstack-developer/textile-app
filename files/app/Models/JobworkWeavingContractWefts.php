<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobworkWeavingContractWefts extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobwork_weaving_contract_id',
        'show_in_print',
        'actual_id',
        'material_id',
    ];

    public function actual()
    {
        return $this->hasOne(Yarn::class, 'id', 'actual_id')->with('counts','plys','units','get_variety');
    }
    public function material()
    {
        return $this->hasOne(Yarn::class, 'id', 'material_id')->with('counts','plys','units','get_variety');
    }

}

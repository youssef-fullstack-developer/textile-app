<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobworkProcessContractDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobwork_process_contract_id',
        'sort_id',
        'sort_no',
        'finished_quality',
        'grey_quality',
        'order_no',
        'quantity',
        'rate',
        'taxable_amount',
    ];


    public function jobwork_process_contract()
    {
        return $this->belongsTo(JobworkProcessContract::class, 'jobwork_process_contract_id', 'id')->with('process','group', 'vendor','agent','contact_person_1','contact_person_2','inspection_type','delivery_location','terms_condition');
    }

    public function sort()
    {
        return $this->hasOne(Sort::class, 'id', 'sort_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobworkFinishedFabricReceive extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'jobwork_process_contract_id',
        'slip_no',
        'received_date',
        'location_id',
        'chk_no',
        'chk_id',
        'ent_no',
        'lot_number',
        'is_last_piece',

    ];


    public function details()
    {
        return $this->hasMany(JobworkFinishedFabricReceiveDetail::class, 'jobwork_finished_fabric_receive_id', 'id')->with('quality');
    }

    public function jobwork_process_contract()
    {
        return $this->hasOne(JobworkProcessContract::class, 'id', 'jobwork_process_contract_id')->with('terms_condition','details','process','group','vendor','agent','contact_person_1','contact_person_2','inspection_type','delivery_location');
    }
    public function location()
    {
        return $this->hasOne(Vendors::class, 'id', 'location_id');
    }
    public function vendor()
    {
        return $this->hasOne(Vendors::class, 'id', 'vendor_id');
    }
}

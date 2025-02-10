<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobworkFinishedFabricReceiveDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobwork_finished_fabric_receive_id',
        'quality_id',
        'design_id',
        'char',
        'piece_no',
        'vendor_piece_number',
        'vendor_lot_number',
        'issued_mtrs',
        'piece_meter',
        'fold',
        'net_piece_mtrs',
        'weight',
        'remarks',
        'is_cutpiece',
    ];



    public function jobwork_finished_fabric_receive()
    {
        return $this->hasOne(JobworkFinishedFabricReceive::class, 'id', 'jobwork_finished_fabric_receive_id')->with('jobwork_process_contract','location','vendor');
    }


    public function quality()
    {
        return $this->hasOne(Sort::class, 'id', 'quality_id');
    }

//    public function design()
//    {
//        return $this->hasOne(Design::class, 'id', 'design_id');
//    }


    public function inspection()
    {
        return $this->hasOne(Inspection::class, 'jobwork_finished_fabric_receive_detail_id', 'id')->with('details', 'packing_type', 'checker', 'vendor_group');
    }

}

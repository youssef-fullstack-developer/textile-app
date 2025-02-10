<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Mailer\Transport;

class JobworkProcessContractIssue extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobwork_process_contract_id',
        'vendor_name',
        'issue_date',
        'transporter_id',
        'lr_no',
        'lr_date',
        'internal_lot_no',
        'vendor_lot_no',
        'fabric_type',
        'mode_of_shipment',
        'vehicle_number',
        'issue_type',
        'complete',
        'complete_date',
        'comments',
    ];


    public function details()
    {
        return $this->hasMany(JobworkProcessContractIssueDetail::class, 'jobwork_process_contract_issue_id', 'id');
    }

    public function jobwork_process_contract()
    {
        return $this->hasOne(JobworkProcessContract::class, 'id', 'jobwork_process_contract_id')->with('details','process','group','vendor','agent','contact_person_1','contact_person_2','inspection_type','delivery_location','terms_condition');
    }
    public function transporter()
    {
        return $this->hasOne(Transportations::class, 'id', 'transporter_id');
    }

}

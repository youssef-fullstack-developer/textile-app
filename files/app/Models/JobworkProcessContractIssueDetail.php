<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobworkProcessContractIssueDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobwork_process_contract_issue_id',
        'quality',
        'piece_no',
        'piece_mtr',
        'weight',
        'avg_wt',
        'picks',
        'grade',
        'lot_no',
    ];


    public function jobwork_process_contract_issue()
    {
        return $this->belongsTo(JobworkProcessContractDetail::class, 'jobwork_process_contract_issue_id', 'id')->with('jobwork_process_contract', 'transporter');
    }


}

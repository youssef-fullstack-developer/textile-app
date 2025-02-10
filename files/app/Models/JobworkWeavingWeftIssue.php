<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobworkWeavingWeftIssue extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobwork_id',
        'issue_date',
        'receiving_person',
        'vehicle_number',
        'dc_number',
        'transport_id',
        'vendor_id',
        'gate_pass_no',
    ];

    public function details()
    {
        return $this->hasMany(JobworkWeavingWeftIssueDetail::class, 'jobwork_weaving_weft_issue_id', 'id')
            ->with('actual_count');
    }

    public function jobWork()
    {
        return $this->hasOne(JobworkWeavingContract::class, 'id', 'jobwork_id')->with('orders', 'sort', 'vendor');
    }

}

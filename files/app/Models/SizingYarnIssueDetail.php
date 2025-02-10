<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizingYarnIssueDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'sizing_yarn_issue_id',
        'actual_count_id',
        'location',
        'cone_tip_color',
        'lot_no',
        'item_type',
        'item',
        'mill',
        'stock_receipt_id',
        'available_quantity',
        'available_bags',
        'no_of_bags_issuing',
        'kgs_per_bag',
        'cones_per_bag',
        'issued_cones',
        'issuing_quantity',
        'convertion_value',
    ];

    public function sizing_yarn_issue()
    {
        return $this->belongsTo(SizingYarnIssue::class, 'id', 'sizing_yarn_issue_id')->with('sizing_plan','transport');
    }

    public function actual_count()
    {
        return $this->hasOne(Yarn::class, 'id', 'actual_count_id');
    }




}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorGroups extends Model
{
    use HasFactory;
    protected $table = 'vendor_groups';
    protected $fillable = array(
        'group',
        'code',
        'group_type',
        'is_internal',
        'status'
    );

    public function yarn_pos()
    {
        return $this->hasMany(YarnPO::class, 'vendor_group_id', 'id')->with('details','vendor_group','agent','certification_type','po_type','pr_num','so_num','payment_terms','vendor','terms_conditions','consignee');
    }
    public function get_group_type()
    {
        return $this->hasOne(GroupType::class, 'id', 'group_type');
    }
}

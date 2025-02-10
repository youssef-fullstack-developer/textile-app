<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sort extends Model
{
    use HasFactory;

    protected $fillable = [
        'fabric',
        'sort_no',
        'details',
        'weave',
        'create_for',
        'code',
        'company',
        'numeric',
        'yarn',
        'reed',
        'denting',
        'epi',
        'width',
        'e_width',
        'reed_space',
        'total_ends',
        'picks',
        'pick_insert',
        'width_cm',
        'composition',
        'size',
        'loom_type',
        'selvedge',
        'dents',
        's_width',
        'ends_per_dent',
        'selvedge_ends',
        'ends_with_selvedge',
        'beam_type',
        'selvedge_drawing',
        'tube_size',
        'total_warp_patterns',
        'total_weft_patterns',
        'total_warp_grams',
        'total_weft_grams',
        'cal_glm_shrinkage',
        'cal_gsm_shrinkage',
        'cal_glm_wihtout_shrinkage',
        'cal_gsm_without_shrinkage',
        'master_quality',
        'act_glm',
        'act_gsm',
        'on_loom',
        'drawing',
        'peg_plan',
        'display_quality',
        'design_paper_image',
        'fabric_image',
        'thread_count',
        'fabric_cover',
        'fabric_cover_range',
        'remarks',
        'is_master',
        'status',
        'hsn',
        'igst',
        'cgst',
        'sgst',
        'cess',
        'hsn_description',
    ];


    public function greys()
    {
        $relations = (new SortGrey())->getRelations();
            return $this->hasMany(SortGrey::class, 'sort_id', 'id')->with('parent_sort');
    }
    public function warps()
    {
        return $this->hasMany(SortWarp::class, 'sort', 'id')->with("material");
    }
    public function wefts()
    {
        return $this->hasMany(SortWeft::class, 'sort', 'id')->with("material");
    }
    public function get_weave()
    {
        return $this->hasOne(Weave::class, 'id', 'weave');
    }
    public function get_master_quality()
    {
        return $this->hasOne(Sort::class, 'id', 'master_quality')->with( 'warps', 'wefts', 'get_weave');
    }

}

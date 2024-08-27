<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sorts', function (Blueprint $table) {
            $table->id();
            $table->string('fabric');
            $table->string('sort_no');
            $table->text('details');
            $table->string('weave');
            $table->string('create_for');
            $table->string('code');
            $table->string('company');
            $table->string('numeric');
            $table->string('yarn');
            $table->string('reed');
            $table->string('denting');
            $table->string('epi');
            $table->string('width');
            $table->string('e_width');
            $table->string('reed_space');
            $table->string('total_ends');
            $table->string('picks');
            $table->string('pick_insert')->nullable();
            $table->string('width_cm');
            $table->string('composition')->nullable();
            $table->string('size')->nullable();
            $table->string('loom_type');
            $table->string('selvedge');
            $table->string('dents');
            $table->string('s_width');
            $table->string('ends_per_dent');
            $table->string('selvedge_ends');
            $table->string('ends_with_selvedge');
            $table->string('beam_type')->nullable();
            $table->string('selvedge_drawing')->nullable();
            $table->string('tube_size')->nullable();
            $table->string('total_warp_patterns')->nullable();
            $table->string('total_weft_patterns')->nullable();
            $table->string('total_warp_grams')->nullable();
            $table->string('total_weft_grams')->nullable();
            $table->string('cal_glm_shrinkage')->nullable();
            $table->string('cal_gsm_shrinkage')->nullable();
            $table->string('cal_glm_wihtout_shrinkage')->nullable();
            $table->string('cal_gsm_without_shrinkage')->nullable();
            $table->string('master_quality')->nullable();
            $table->string('act_glm')->nullable();
            $table->string('act_gsm')->nullable();
            $table->string('on_loom')->nullable();
            $table->string('drawing')->nullable();
            $table->string('peg_plan')->nullable();
            $table->string('display_quality')->nullable();
            $table->string('design_paper_image')->nullable();
            $table->string('fabric_image')->nullable();
            $table->string('thread_count')->nullable();
            $table->string('fabric_cover')->nullable();
            $table->string('fabric_cover_range')->nullable();
            $table->string('remarks')->nullable();
            $table->boolean('is_master');
            $table->boolean('status');
            $table->string('hsn');
            $table->string('igst')->nullable();
            $table->string('cgst')->nullable();
            $table->string('sgst')->nullable();
            $table->string('cess')->nullable();
            $table->text('hsn_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sorts');
    }
};

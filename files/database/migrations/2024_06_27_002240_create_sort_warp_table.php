<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sort_warp', function (Blueprint $table) {
            $table->id();
            $table->integer('sort');
            $table->string('warp_pattern');
            $table->string('warp_material');
            $table->string('warp_shrinkage');
            $table->string('warp_total_ends');
            $table->string('warp_grams_meters');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sort_warp');
    }
};

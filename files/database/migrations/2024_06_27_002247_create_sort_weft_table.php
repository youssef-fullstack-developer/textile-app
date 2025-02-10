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
        Schema::create('sort_weft', function (Blueprint $table) {
            $table->id();
            $table->integer('sort');
            $table->string('weft_pattern');
            $table->string('weft_material');
            $table->string('weft_shrinkage');
            $table->string('weft_picks');
            $table->string('weft_grams_meters');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sort_weft');
    }
};

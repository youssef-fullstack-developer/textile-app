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
        Schema::create('selvedge', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('catch_cord_ends');
            $table->float('reed_count');
            $table->float('selvedge_width');
            $table->float('dents')->nullable();
            $table->float('ends_per_dent');
            $table->float('extra_ends')->nullable();
            $table->float('selvedge_ends')->nullable();
            $table->string('weave_id');
            $table->float('ends_per_heild')->nullable();
            $table->boolean('status')->default(true);
            $table->float('ends_per_wire');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selvedge');
    }
};

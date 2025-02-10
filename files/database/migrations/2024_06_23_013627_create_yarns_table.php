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
        Schema::create('yarns', function (Blueprint $table) {
            $table->id();
            $table->integer('count');
            $table->integer('ply');
            $table->integer('type');
            $table->string('unit');
            $table->integer('variety');
            $table->string('filaments');
            $table->string('tpm');
            $table->string('color');
            $table->string('reorder');
            $table->string('buy_uom');
            $table->string('blend');
            $table->string('danger');
            $table->string('name');
            $table->string('display_name');
            $table->string('conversion');
            $table->string('hsn');
            $table->string('igst');
            $table->string('cgst');
            $table->string('sgst');
            $table->string('cess');
            $table->boolean('is_apply');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yarns');
    }
};

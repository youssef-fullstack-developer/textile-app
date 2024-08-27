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
        Schema::create('yarn_types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('unit');
            $table->string('factor');
            $table->string('loss');
            $table->string('system');
            $table->string('code');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yarn_types');
    }
};

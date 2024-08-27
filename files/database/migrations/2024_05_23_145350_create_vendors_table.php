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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('prefix');
            $table->string('contact_name');
            $table->string('contact');
            $table->string('landline');
            $table->string('email');
            $table->string('state_id');
            $table->string('city_id');
            $table->string('pin');
            $table->string('fax');
            $table->string('gstn');
            $table->string('rating');
            $table->string('preference');
            $table->string('interest');
            $table->string('gst_reg_type');
            $table->string('vendor_group_id');
            $table->string('pan');
            $table->text('address');
            $table->string('account_group');
            $table->boolean('is_tds');
            $table->string('deductee_type');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};

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
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gst')->nullable();
            $table->string('country_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('address_3')->nullable();
            $table->string('city_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('buyer_pincode');
            $table->string('email')->nullable();
            $table->string('buyer_no')->nullable();
            $table->string('buyer_code')->nullable();
            $table->string('bank')->nullable();
            $table->string('bank_country_id')->nullable();
            $table->string('bank_state_id')->nullable();
            $table->string('state_code')->nullable();
            $table->string('bank_address')->nullable();
            $table->string('pincode')->nullable();
            $table->string('bank_city_id')->nullable();
            $table->boolean('is_active')->default(false);
            $table->string('credit_limit')->nullable();
            $table->string('interest')->nullable();
            $table->string('gst_type')->nullable();
            $table->boolean('consignee_as_buyer')->default(true);
            $table->string('account_group')->nullable();
            $table->string('vendor_group_id')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('pan')->nullable();
            $table->string('port_landing')->nullable();
            $table->string('port_destination')->nullable();
            $table->string('currency')->nullable();
            $table->boolean('is_self')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyers');
    }
};

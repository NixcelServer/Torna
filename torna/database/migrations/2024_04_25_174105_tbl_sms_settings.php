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
        //
        Schema::create('tbl_sms_settings', function (Blueprint $table) {
            $table->id('tbl_sms_setting_id');
            $table->integer('tbl_user_id')->required();
            $table->integer('tbl_comp_id')->required();
            $table->string('sid')->nullable();
            $table->string('auth_token')->nullable();
            $table->string('mobile_no')->nullable();
            
            $table->date('add_date')->required();
            $table->time('add_time')->required();
            $table->date('updated_date')->nullable();
            $table->time('updated_time')->nullable();
            $table->string('flag')->default('show');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tbl_sms_settings');
    }
};
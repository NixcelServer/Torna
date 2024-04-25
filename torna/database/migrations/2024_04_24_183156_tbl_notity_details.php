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
        Schema::create('tbl_notify_details', function (Blueprint $table) {
            $table->id('tbl_notify_id');
            $table->integer('tbl_user_id')->required();
            $table->integer('tbl_comp_id')->required();
            $table->integer('tbl_ex_id')->required();
            $table->string('email_service')->default('disabled');
            $table->string('smtp')->nullable();
            $table->string('port')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('whatsapp_service')->default('disabled');
            $table->string('whatsapp_no')->nullable();
            $table->string('sms_service')->default('disabled');
            $table->string('sid')->nullable();
            $table->string('auth_token')->nullable();
            $table->string('phone_no')->nullable();
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
        Schema::dropIfExists('tbl_notify_details');
    }
};

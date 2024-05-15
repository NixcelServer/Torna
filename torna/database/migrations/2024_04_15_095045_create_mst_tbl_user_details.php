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
        Schema::create('mst_tbl_user_details', function (Blueprint $table) {
            $table->id('tbl_user_id');
            $table->unsignedBigInteger('tbl_comp_id');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('contact_no');
            $table->string('active_status', 45)->default('Pending');
            $table->unsignedBigInteger('role_id');
            $table->date('created_date')->nullable();
            $table->time('created_time')->nullable();
            $table->date('updated_date')->nullable();
            $table->time('updated_time')->nullable();
            $table->string('password');
            $table->string('flag')->default('show');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_tbl_user_details');
    }
};
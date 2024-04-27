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
        Schema::create('tbl_visitor_details', function (Blueprint $table) {
            $table->id('tbl_visitor_detail_id');
            $table->integer('tbl_ex_id')->required();
            $table->integer('tbl_comp_id')->required();
            $table->string('name');
            $table->string('email');
            $table->string('contact_no');
            $table->string('service');
            $table->date('add_date')->required();
            $table->time('add_time')->required();
            
            $table->string('flag')->default('show');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

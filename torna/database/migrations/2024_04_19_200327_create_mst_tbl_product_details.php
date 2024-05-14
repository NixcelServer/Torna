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
        Schema::create('mst_tbl_product_details', function (Blueprint $table) {
            $table->id('tbl_product_id');
            $table->integer('tbl_comp_id');
            $table->string('product_name', 250);
            $table->text('description')->nullable();
            $table->string('category', 100)->nullable();
            $table->integer('created_by');
            $table->date('created_date');
            $table->time('created_time');
            $table->integer('updated_by')->nullable();
            $table->date('updated_date')->nullable();
            $table->time('updated_time')->nullable();
            $table->string('flag', 45)->default('show');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_tbl_product_details');
    }
};

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
        Schema::create('tbl_assigned_products', function (Blueprint $table) {
            $table->id('tbl_assigned_prod_id');
            $table->integer('tbl_doc_id');
            $table->string('tbl_product_id');
            
            $table->integer('created_by')->nullable();
            $table->date('created_date');
            $table->string('created_time', 45);
            $table->integer('deleted_by')->nullable();
            $table->date('deleted_date')->nullable();
            $table->string('deleted_time', 45)->nullable();
            $table->string('flag', 45)->default('show');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('tbl_assigned_products');
    }
};

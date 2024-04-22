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
        Schema::create('mst_tbl_documents', function (Blueprint $table) {
            $table->id('tbl_doc_id');
            $table->string('doc_name', 250);
            $table->string('doc_type', 45)->nullable();
            $table->string('doc_url', 250)->nullable();
            $table->string('doc_description', 250)->nullable();
            $table->string('product_name', 250); // New field: product_name
            $table->integer('tbl_product_id'); // New field: product_id
            $table->string('active_status', 45)->default('Active');
            $table->integer('created_by')->nullable();
            $table->date('created_date');
            $table->string('created_time', 45);
            $table->integer('updated_by')->nullable();
            $table->date('updated_date')->nullable();
            $table->string('updated_time', 45)->nullable();
            $table->string('flag', 45)->default('Show');
            $table->timestamps();

            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_tbl_documents');
    }
};

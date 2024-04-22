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
        Schema::create('mst_tbl_industry', function (Blueprint $table) {
            $table->increments('tbl_industry_id');
            $table->string('industry_name', 100);
            $table->date('created_date');
            $table->string('created_time', 45);
            $table->date('updated_date')->nullable();
            $table->string('updated_time', 45)->nullable();
            $table->string('active_status', 45)->default('Active');
            $table->string('flag', 45)->default('Show');
            $table->timestamps(); // Adds created_at and updated_at columns
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_tbl_industry');
    }
};

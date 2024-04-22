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
        Schema::create('mst_tbl_company_details', function (Blueprint $table) {
            $table->id('tbl_comp_id');
            $table->unsignedBigInteger('comp_industry')->nullable();
            $table->text('comp_address')->nullable();
            $table->string('unique_name', 100);
            $table->string('company_name', 100);
            Stable->string('industry_name',100);
            $table->string('contact_no', 100);
            $table->string('email', 100);
            $table->string('comp_website', 100)->nullable();
            $table->string('comp_url', 100)->nullable();
            $table->binary('company_logo')->nullable();
            $table->string('active_status', 45)->default('Pending');
            $table->date('registered_date')->nullable();
            $table->string('registered_time', 45)->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->date('updated_date')->nullable();
            $table->string('updated_time', 45)->nullable();
            $table->string('flag', 45)->default('show');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_tbl_company_details');
    }
};

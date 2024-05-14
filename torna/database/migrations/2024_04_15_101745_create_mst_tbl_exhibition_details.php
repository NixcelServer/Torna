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
        Schema::create('mst_tbl_exhibition_details', function (Blueprint $table) {
            $table->id('tbl_ex_id');
            $table->integer('tbl_comp_id');
            $table->string('ex_name', 250);
            $table->date('ex_from_date');
            $table->date('ex_to_date');
            $table->string('ex_country', 45)->nullable();
            $table->string('ex_city', 45)->nullable();
            $table->string('venue', 100);
            $table->string('industry', 100);
            $table->binary('company_logo')->nullable();
            $table->string('venue_line_venue_2', 100)->nullable();
            $table->string('venue_line_venue_3', 100)->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('ex_organized_by', 100)->nullable();
            $table->string('active_status', 45)->default('Active');
            $table->integer('ex_created_by_role_id')->nullable();
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
        Schema::dropIfExists('mst_tbl_exhibition_details');
    }
};

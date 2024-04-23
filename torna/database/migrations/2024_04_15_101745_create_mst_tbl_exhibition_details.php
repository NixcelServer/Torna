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
            $table->id('mst_tbl_ex_id');
            $table->integer('mst_tbl_com_id');
            $table->string('ex_name', 250);
            $table->date('ex_from_date');
            $table->date('ex_to_date');
            $table->string('ex_country', 45);
            $table->string('ex_city', 45);
            $table->string('venue', 100);
            $table->string('industry', 100);
            $table->string('venue_line_venue_2', 100)->nullable();
            $table->string('venue_line_venue_3', 100)->nullable();
            $table->string('start_time', 45)->nullable();
            $table->string('end_time', 45)->nullable();
            $table->string('ex_organized_by', 100)->nullable();
            $table->string('active_status', 45)->default('Active');
            $table->integer('created_by');
            $table->date('created_date');
            $table->string('created_time', 45);
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('mst_tbl_exhibition_details');
    }
};

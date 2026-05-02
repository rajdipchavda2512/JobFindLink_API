<?php
// database/migrations/2024_01_01_000005_create_employment_histories_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employment_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('company_name', 200);
            $table->string('industry_sector', 100)->nullable();
            $table->boolean('currently_working')->default(false);
            $table->enum('employment_type', ['full-time', 'part-time', 'contract', 'internship', 'freelance']);
            $table->string('notice_period', 50)->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->timestamps();
            
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->index('employee_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employment_histories');
    }
};
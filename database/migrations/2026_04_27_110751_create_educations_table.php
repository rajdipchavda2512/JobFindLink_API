<?php
// database/migrations/2024_01_01_000007_create_educations_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('education_level', 100);
            $table->string('college_name', 200);
            $table->string('degree', 100);
            $table->string('specialisation', 100)->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->timestamps();
            
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->index('employee_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('educations');
    }
};
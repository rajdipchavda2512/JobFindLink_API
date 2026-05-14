<?php
// database/migrations/2024_01_01_000000_create_employers_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('mobile', 10)->unique();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('company_name');
            $table->string('company_area')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->timestamp('mobile_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employers');
    }
};
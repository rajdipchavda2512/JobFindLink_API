<?php
// database/migrations/2024_01_01_000002_create_locations_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('state', 100);
            $table->string('city', 100);
            $table->string('area', 200);
            $table->timestamps();
            
            $table->index(['state', 'city']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('locations');
    }
};
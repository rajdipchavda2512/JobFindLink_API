<?php
// database/migrations/2024_01_01_000001_add_json_columns_to_employees_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJsonColumnsToEmployeesTable extends Migration
{
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            // Add JSON columns for multiple education records
            $table->json('educations_json')->nullable()->after('specialisation');
            $table->string('highest_qualification')->nullable()->after('educations_json');
            
            // Add JSON columns for multiple experience records
            $table->json('experiences_json')->nullable()->after('notice_period');
            $table->integer('total_experience_years')->default(0)->after('experiences_json');
            $table->integer('total_experience_months')->default(0)->after('total_experience_years');
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn([
                'educations_json',
                'highest_qualification',
                'experiences_json',
                'total_experience_years',
                'total_experience_months'
            ]);
        });
    }
}
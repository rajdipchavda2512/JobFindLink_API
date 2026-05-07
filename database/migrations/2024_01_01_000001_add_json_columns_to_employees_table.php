<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * This migration adds JSON columns to the employees table.
 * Uses hasTable guard to avoid failure if the table doesn't exist yet
 * (the employees table is created by 2026_04_09_000002_create_employee_profiles_table.php
 * but the actual 'employees' table is from 2026_04_27_110749_create_employees_table.php
 * which runs AFTER this date-named file).
 *
 * These columns are now added in 2026_05_01_101508_add_missing_columns_to_employees_table.php
 * So this migration is now a safe no-op.
 */
return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('employees')) {
            return; // employees table created later — columns added in 2026_05_01 migration
        }

        Schema::table('employees', function (Blueprint $table) {
            if (!Schema::hasColumn('employees', 'educations_json')) {
                $table->json('educations_json')->nullable();
            }
            if (!Schema::hasColumn('employees', 'highest_qualification')) {
                $table->string('highest_qualification')->nullable();
            }
            if (!Schema::hasColumn('employees', 'experiences_json')) {
                $table->json('experiences_json')->nullable();
            }
            if (!Schema::hasColumn('employees', 'total_experience_years')) {
                $table->integer('total_experience_years')->default(0);
            }
            if (!Schema::hasColumn('employees', 'total_experience_months')) {
                $table->integer('total_experience_months')->default(0);
            }
        });
    }

    public function down(): void
    {
        if (!Schema::hasTable('employees')) {
            return;
        }

        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn([
                'educations_json',
                'highest_qualification',
                'experiences_json',
                'total_experience_years',
                'total_experience_months',
            ]);
        });
    }
};
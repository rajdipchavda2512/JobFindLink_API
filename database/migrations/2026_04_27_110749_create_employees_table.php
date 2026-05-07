<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * This migration originally tried to ADD columns to 'employees' before it was created.
 * The employees table is now created by 2026_04_26_000001_create_employees_table.php
 * with all required columns included.
 *
 * This migration is now a safe no-op.
 */
return new class extends Migration
{
    public function up(): void
    {
        // All columns are now included in 2026_04_26_000001_create_employees_table.php
        // This migration is kept for migration history integrity only.
    }

    public function down(): void
    {
        // No-op
    }
};
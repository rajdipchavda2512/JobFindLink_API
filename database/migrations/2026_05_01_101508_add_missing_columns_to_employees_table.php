<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Originally added missing columns to the employees table.
 * All those columns are now included in the CREATE TABLE migration
 * (2026_04_26_000001_create_employees_table.php).
 *
 * This migration is now a safe no-op.
 */
return new class extends Migration
{
    public function up(): void
    {
        // All columns now part of 2026_04_26_000001_create_employees_table.php
    }

    public function down(): void
    {
        // No-op
    }
};
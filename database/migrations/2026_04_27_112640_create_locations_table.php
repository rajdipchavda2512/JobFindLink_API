<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * This migration is intentionally a no-op.
 * The locations table is already created by 2026_04_27_110749_create_locations_table.php
 */
return new class extends Migration
{
    public function up(): void
    {
        // No-op: table already created by earlier migration
    }

    public function down(): void
    {
        // No-op
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('full_name', 100)->after('name')->nullable();
            $table->string('mobile', 15)->unique()->nullable()->after('email');
            $table->enum('role', ['employee', 'employer', 'admin'])->default('employee')->after('password');
            $table->boolean('is_verified')->default(false)->after('role');
            $table->boolean('is_active')->default(true)->after('is_verified');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['full_name', 'mobile', 'role', 'is_verified', 'is_active']);
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('employer_profiles', function (Blueprint $table) {
            $table->string('industry_type', 100)->nullable()->after('work_email');
            $table->string('company_size', 50)->nullable()->after('industry_type');
            $table->string('company_website', 255)->nullable()->after('company_size');
            $table->text('company_description')->nullable()->after('company_website');
            $table->string('employer_designation', 100)->nullable()->after('company_description');
        });
    }

    public function down(): void
    {
        Schema::table('employer_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'industry_type',
                'company_size',
                'company_website',
                'company_description',
                'employer_designation'
            ]);
        });
    }
};

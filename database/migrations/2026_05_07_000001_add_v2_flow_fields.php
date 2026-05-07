<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration: Add new fields for JobFindLink v2 flow
 * - OTP table: add purpose & 10-digit mobile support
 * - Employer profiles: add location field
 * - Employees: add resume_path, profile_photo_path, position (seeking_position)
 */
return new class extends Migration
{
    public function up(): void
    {
        // 1. Update otp_verifications: support 10-digit mobile
        Schema::table('otp_verifications', function (Blueprint $table) {
            if (!Schema::hasColumn('otp_verifications', 'purpose')) {
                $table->string('purpose', 50)->default('verify')->after('otp_code');
            }
        });

        // 2. Update employer_profiles: add location
        if (Schema::hasTable('employer_profiles')) {
            Schema::table('employer_profiles', function (Blueprint $table) {
                if (!Schema::hasColumn('employer_profiles', 'location')) {
                    $table->string('location', 200)->nullable()->after('company_name');
                }
                if (!Schema::hasColumn('employer_profiles', 'is_verified')) {
                    $table->boolean('is_verified')->default(false)->after('location');
                }
            });
        }

        // 3. Update employees: profile_photo_path, resume_path, seeking_position
        if (Schema::hasTable('employees')) {
            Schema::table('employees', function (Blueprint $table) {
                if (!Schema::hasColumn('employees', 'profile_photo_path')) {
                    $table->string('profile_photo_path')->nullable()->after('profile_photo');
                }
                if (!Schema::hasColumn('employees', 'resume_path')) {
                    $table->string('resume_path')->nullable()->after('resume');
                }
                if (!Schema::hasColumn('employees', 'seeking_position')) {
                    $table->string('seeking_position', 150)->nullable()->after('job_title_id');
                }
                if (!Schema::hasColumn('employees', 'resume_skipped')) {
                    $table->boolean('resume_skipped')->default(false)->after('resume_path');
                }
            });
        }

        // 4. Update users: ensure mobile is varchar(15) which supports 10-digit + country code
        // (already correct — just ensure is_mobile_verified exists separately from is_verified)
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'mobile_verified_at')) {
                $table->timestamp('mobile_verified_at')->nullable()->after('is_verified');
            }
            if (!Schema::hasColumn('users', 'profile_setup_complete')) {
                $table->boolean('profile_setup_complete')->default(false)->after('mobile_verified_at');
            }
        });
    }

    public function down(): void
    {
        Schema::table('otp_verifications', function (Blueprint $table) {
            $table->dropColumn('purpose');
        });

        if (Schema::hasTable('employer_profiles')) {
            Schema::table('employer_profiles', function (Blueprint $table) {
                $table->dropColumn(['location', 'is_verified']);
            });
        }

        if (Schema::hasTable('employees')) {
            Schema::table('employees', function (Blueprint $table) {
                $table->dropColumn(['profile_photo_path', 'resume_path', 'seeking_position', 'resume_skipped']);
            });
        }

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['mobile_verified_at', 'profile_setup_complete']);
        });
    }
};

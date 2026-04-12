<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update job_postings Table
        Schema::table('job_postings', function (Blueprint $table) {
            $table->date('application_deadline')->nullable()->after('perks');
            $table->integer('max_applicants')->nullable()->after('application_deadline');
            $table->boolean('is_draft')->default(false)->after('status');
        });
        // Use raw statements to safely alter enums without Doctrine DBAL dependency
        DB::statement("ALTER TABLE job_postings MODIFY COLUMN work_location_type ENUM('wfh', 'wfo', 'field', 'hybrid')");
        DB::statement("ALTER TABLE job_postings MODIFY COLUMN pay_type ENUM('fixed', 'range', 'negotiable')");
        // We added 'draft' status in the controller, so we should add it to enum
        DB::statement("ALTER TABLE job_postings MODIFY COLUMN status ENUM('pending', 'active', 'rejected', 'closed', 'draft') DEFAULT 'pending'");

        // Update employee_profiles Table
        Schema::table('employee_profiles', function (Blueprint $table) {
            $table->string('resume_template', 50)->default('classic')->after('resume_type');
            $table->json('resume_data')->nullable()->after('resume_template');
            $table->string('id_document_back_url', 255)->nullable()->after('id_document_url');
            $table->string('aadhaar_number_masked', 20)->nullable()->after('id_document_back_url');
            $table->boolean('profile_visible')->default(true)->after('profile_complete');
            $table->boolean('show_mobile')->default(false)->after('profile_visible');
            $table->boolean('job_alerts')->default(true)->after('show_mobile');
            $table->boolean('application_updates')->default(true)->after('job_alerts');
            $table->boolean('promotions')->default(false)->after('application_updates');
            $table->integer('views_count')->default(0)->after('promotions');
        });

        // Update employer_profiles Table
        Schema::table('employer_profiles', function (Blueprint $table) {
            $table->json('documents')->nullable()->after('is_verified');
            $table->boolean('application_alerts')->default(true)->after('documents');
            $table->boolean('weekly_reports')->default(true)->after('application_alerts');
            $table->boolean('candidate_messages')->default(false)->after('weekly_reports');
        });

        // Update applications Table
        Schema::table('applications', function (Blueprint $table) {
            $table->text('cover_note')->nullable()->after('status');
            $table->string('resume_url', 255)->nullable()->after('cover_note');
            $table->string('apply_method', 50)->default('existing')->after('resume_url');
        });

        // Update notifications Table
        Schema::table('notifications', function (Blueprint $table) {
            $table->boolean('is_read')->default(false)->after('status');
        });
        DB::statement("ALTER TABLE notifications MODIFY COLUMN type ENUM('whatsapp', 'email', 'system')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverting enums natively isn't strictly necessary for local dev downtime, but here are the safe drops
        Schema::table('job_postings', function (Blueprint $table) {
            $table->dropColumn(['application_deadline', 'max_applicants', 'is_draft']);
        });

        Schema::table('employee_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'resume_template', 'resume_data', 'id_document_back_url', 
                'aadhaar_number_masked', 'profile_visible', 'show_mobile', 
                'job_alerts', 'application_updates', 'promotions', 'views_count'
            ]);
        });

        Schema::table('employer_profiles', function (Blueprint $table) {
            $table->dropColumn(['documents', 'application_alerts', 'weekly_reports', 'candidate_messages']);
        });

        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn(['cover_note', 'resume_url', 'apply_method']);
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn('is_read');
        });
    }
};

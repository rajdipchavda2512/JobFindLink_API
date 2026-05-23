<?php
// database/migrations/2024_01_15_000001_create_employer_job_posts_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployerJobPostsTable extends Migration
{
    public function up()
    {
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('users')->onDelete('cascade');
            $table->string('company_name');
            $table->string('job_title');
            $table->foreignId('job_title_id')->nullable()->constrained('positions')->onDelete('set null');
            $table->string('job_role_category')->nullable();
            $table->foreignId('job_role_id')->nullable()->constrained('job_roles')->onDelete('set null');
            $table->enum('job_type', ['full_time', 'part_time', 'both'])->default('full_time');
            $table->boolean('is_night_shift')->default(false);
            $table->enum('work_location_type', ['work_from_office', 'work_from_home', 'field_job']);
            $table->string('office_address')->nullable();
            $table->string('job_city')->nullable();
            $table->string('job_state')->nullable();
            $table->string('field_work_area')->nullable();
            $table->string('floor_plot_no')->nullable();
            $table->enum('pay_type', ['fixed', 'fixed_incentive', 'incentive_only']);
            $table->decimal('min_fixed_salary', 10, 2)->nullable();
            $table->decimal('max_fixed_salary', 10, 2)->nullable();
            $table->decimal('avg_incentive', 10, 2)->nullable();
            $table->json('perks')->nullable();
            $table->string('other_perks')->nullable();
            
            // Candidate Requirements
            $table->string('minimum_education');
            $table->json('known_languages')->nullable();
            $table->enum('experience_requirement', ['any', 'experienced_only', 'fresher_only']);
            $table->integer('min_experience_years')->nullable();
            $table->integer('max_experience_years')->nullable();
            $table->json('degrees')->nullable();
            $table->json('skills')->nullable();
            $table->integer('min_age')->default(18);
            $table->integer('max_age')->default(60);
            $table->enum('gender_preference', ['male', 'female', 'both'])->default('both');
            $table->string('prefer_applications_from')->nullable();
            $table->text('job_description')->nullable();
            
            // Additional Requirements
            $table->json('additional_requirements')->nullable();
            $table->json('assets_required')->nullable();
            
            // Communication Preferences
            $table->enum('contact_preference', ['myself', 'other_recruiter', 'no']);
            $table->string('other_recruiter_name')->nullable();
            $table->string('other_recruiter_whatsapp')->nullable();
            $table->string('other_recruiter_email')->nullable();
            $table->enum('candidate_contact_filter', ['all', 'high_medium', 'high_only'])->default('all');
            $table->enum('whatsapp_alert_preference', ['myself', 'other_recruiter', 'daily_summary'])->default('myself');
            
            // Job Status
            $table->enum('status', ['draft', 'published', 'closed', 'expired'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_posts');
    }
}
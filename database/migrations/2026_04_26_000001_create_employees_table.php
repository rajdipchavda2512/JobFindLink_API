<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the employees table — the main profile table for employees in v2.
 * This consolidates what was previously split between users + employee_profiles.
 */
return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('employees')) {
            return; // Already exists
        }

        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('profile_step')->default(0);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Step 1: Basic Details
            $table->string('full_name', 150)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('mobile_number', 20)->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('profile_photo')->nullable();      // URL
            $table->string('profile_photo_path')->nullable(); // Storage path
            $table->integer('age')->nullable();

            // Step 2: Job Preference
            $table->string('seeking_position', 150)->nullable();
            $table->unsignedBigInteger('job_title_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->enum('experience_type', ['fresher', 'experienced'])->nullable();
            $table->integer('exp_years')->default(0);
            $table->integer('exp_months')->default(0);
            $table->integer('total_experience')->default(0); // in months
            $table->integer('total_experience_years')->default(0);

            // Step 3: Location & Salary
            $table->json('preferred_locations')->nullable();
            $table->decimal('current_salary', 10, 2)->nullable();
            $table->decimal('expected_salary', 10, 2)->nullable();

            // Step 4: Skills & Languages
            $table->text('skills')->nullable();           // Comma-separated (legacy)
            $table->json('skills_json')->nullable();      // JSON array
            $table->json('languages')->nullable();         // JSON array of language names
            $table->text('description')->nullable();

            // Step 5: Education
            $table->string('education_level', 100)->nullable();
            $table->string('college_name', 200)->nullable();
            $table->unsignedBigInteger('degree_id')->nullable();
            $table->string('specialisation', 150)->nullable();
            $table->date('education_start_date')->nullable();
            $table->date('education_end_date')->nullable();
            $table->json('educations_json')->nullable();    // Multiple education records
            $table->string('highest_qualification', 100)->nullable();

            // Step 6: Work Experience
            $table->string('company_name', 200)->nullable();
            $table->unsignedBigInteger('industry_id')->nullable();
            $table->enum('employment_type', ['full-time', 'part-time', 'shift', 'contract'])->nullable();
            $table->date('work_start_date')->nullable();
            $table->date('work_end_date')->nullable();
            $table->boolean('currently_working')->default(false);
            $table->string('notice_period', 50)->nullable();
            $table->json('experiences_json')->nullable();   // Multiple work experience records

            // Step 0 & 7: Resume & Availability
            $table->string('resume')->nullable();           // URL
            $table->string('resume_path')->nullable();      // Storage path
            $table->boolean('resume_skipped')->default(false);
            $table->enum('availability', ['immediately', 'within_7_days', 'flexible'])->nullable();

            // Profile Tracking
            $table->boolean('profile_completed')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

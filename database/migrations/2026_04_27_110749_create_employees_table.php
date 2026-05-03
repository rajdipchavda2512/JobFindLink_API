<?php
// database/migrations/2025_01_15_000003_add_profile_fields_to_employees_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            // Step 1: Basic Details
            $table->string('mobile_number', 20)->nullable()->after('email');
            $table->string('profile_photo')->nullable()->after('gender');
            
            // Step 2: Job Preference
            $table->enum('experience_type', ['fresher', 'experienced'])->nullable()->after('total_experience');
            $table->integer('exp_years')->default(0)->after('experience_type');
            $table->integer('exp_months')->default(0)->after('exp_years');
            
            // Step 3: Location & Salary (JSON for multi-select)
            $table->json('preferred_locations')->nullable()->after('location_id');
            
            // Step 4: Skills (JSON format)
            $table->json('skills_json')->nullable()->after('skills');
            
            // Step 5: Education
            $table->string('education_level', 100)->nullable()->after('skills_json'); // Below 10th, 10th, 12th, Diploma, Graduate, Post Graduate, PhD
            $table->string('college_name', 200)->nullable()->after('education_level');
            $table->unsignedBigInteger('degree_id')->nullable()->after('college_name');
            $table->string('specialisation', 100)->nullable()->after('degree_id');
            $table->date('education_start_date')->nullable()->after('specialisation');
            $table->date('education_end_date')->nullable()->after('education_start_date');
            
            // Step 6: Work Experience (current/most recent)
            $table->string('current_company', 200)->nullable()->after('description');
            $table->unsignedBigInteger('industry_id')->nullable()->after('current_company');
            $table->enum('employment_type', ['full-time', 'part-time', 'shift', 'contract'])->nullable()->after('industry_id');
            $table->date('work_start_date')->nullable()->after('employment_type');
            $table->date('work_end_date')->nullable()->after('work_start_date');
            $table->boolean('currently_working')->default(false)->after('work_end_date');
            $table->string('notice_period', 50)->nullable()->after('currently_working');
            
            // Step 7: Availability
            $table->enum('availability', ['immediately', 'within_7_days', 'flexible'])->nullable()->after('expected_salary');
            
            // Profile step tracking
            $table->tinyInteger('profile_step')->default(1)->after('id');
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn([
                'mobile_number', 'profile_photo', 'experience_type', 'exp_years', 'exp_months',
                'preferred_locations', 'skills_json', 'education_level', 'college_name', 'degree_id',
                'specialisation', 'education_start_date', 'education_end_date', 'current_company',
                'industry_id', 'employment_type', 'work_start_date', 'work_end_date', 'currently_working',
                'notice_period', 'availability', 'profile_step'
            ]);
        });
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingColumnsToEmployeesTable extends Migration
{
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            // Check if columns don't exist before adding
            if (!Schema::hasColumn('employees', 'languages')) {
                $table->json('languages')->nullable()->after('skills');
            }
            
            if (!Schema::hasColumn('employees', 'preferred_locations')) {
                $table->json('preferred_locations')->nullable()->after('exp_months');
            }
            
            if (!Schema::hasColumn('employees', 'current_salary')) {
                $table->decimal('current_salary', 10, 2)->nullable()->after('preferred_locations');
            }
            
            if (!Schema::hasColumn('employees', 'expected_salary')) {
                $table->decimal('expected_salary', 10, 2)->nullable()->after('current_salary');
            }
            
            if (!Schema::hasColumn('employees', 'education_level')) {
                $table->string('education_level')->nullable()->after('expected_salary');
            }
            
            if (!Schema::hasColumn('employees', 'college_name')) {
                $table->string('college_name')->nullable()->after('education_level');
            }
            
            if (!Schema::hasColumn('employees', 'degree_id')) {
                $table->foreignId('degree_id')->nullable()->constrained()->after('college_name');
            }
            
            if (!Schema::hasColumn('employees', 'specialisation')) {
                $table->string('specialisation')->nullable()->after('degree_id');
            }
            
            if (!Schema::hasColumn('employees', 'company_name')) {
                $table->string('company_name')->nullable()->after('specialisation');
            }
            
            if (!Schema::hasColumn('employees', 'industry_id')) {
                $table->foreignId('industry_id')->nullable()->constrained()->after('company_name');
            }
            
            if (!Schema::hasColumn('employees', 'employment_type')) {
                $table->enum('employment_type', ['full-time', 'part-time', 'shift', 'contract'])->nullable()->after('industry_id');
            }
            
            if (!Schema::hasColumn('employees', 'work_start_date')) {
                $table->date('work_start_date')->nullable()->after('employment_type');
            }
            
            if (!Schema::hasColumn('employees', 'work_end_date')) {
                $table->date('work_end_date')->nullable()->after('work_start_date');
            }
            
            if (!Schema::hasColumn('employees', 'currently_working')) {
                $table->boolean('currently_working')->default(false)->after('work_end_date');
            }
            
            if (!Schema::hasColumn('employees', 'notice_period')) {
                $table->string('notice_period')->nullable()->after('currently_working');
            }
            
            if (!Schema::hasColumn('employees', 'resume')) {
                $table->string('resume')->nullable()->after('notice_period');
            }
            
            if (!Schema::hasColumn('employees', 'availability')) {
                $table->enum('availability', ['immediately', 'within_7_days', 'flexible'])->nullable()->after('resume');
            }
            
            if (!Schema::hasColumn('employees', 'profile_step')) {
                $table->integer('profile_step')->default(1)->after('availability');
            }
            
            if (!Schema::hasColumn('employees', 'profile_completed')) {
                $table->boolean('profile_completed')->default(false)->after('profile_step');
            }
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn([
                'languages',
                'preferred_locations',
                'current_salary',
                'expected_salary',
                'education_level',
                'college_name',
                'degree_id',
                'specialisation',
                'company_name',
                'industry_id',
                'employment_type',
                'work_start_date',
                'work_end_date',
                'currently_working',
                'notice_period',
                'resume',
                'availability',
                'profile_step',
                'profile_completed'
            ]);
        });
    }
}
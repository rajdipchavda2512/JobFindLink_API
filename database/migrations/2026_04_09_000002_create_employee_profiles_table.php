<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employee_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('experience_type', ['fresher', 'experienced'])->default('fresher');
            $table->string('experience_field', 100)->nullable();
            $table->json('preferred_locations')->nullable();
            $table->string('job_position', 100)->nullable();
            $table->json('skills')->nullable();
            $table->integer('expected_salary')->nullable();
            $table->integer('age')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->json('job_type')->nullable();
            $table->enum('availability', ['immediate', 'notice_period'])->nullable();
            $table->string('resume_url', 255)->nullable();
            $table->enum('resume_type', ['uploaded', 'built'])->nullable();
            $table->string('id_document_url', 255)->nullable();
            $table->boolean('id_verified')->default(false);
            $table->boolean('profile_complete')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employee_profiles');
    }
};

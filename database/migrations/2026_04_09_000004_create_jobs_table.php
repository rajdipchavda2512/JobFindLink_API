<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('users')->onDelete('cascade');
            $table->string('company_name', 150);
            $table->string('title', 100);
            $table->enum('job_type', ['full-time', 'part-time', 'freelance', 'shift']);
            $table->string('location', 100);
            $table->enum('work_location_type', ['wfh', 'wfo', 'field']);
            $table->enum('pay_type', ['fixed', 'range']);
            $table->integer('salary_min')->nullable();
            $table->integer('salary_max')->nullable();
            $table->text('description')->nullable();
            $table->json('skills_required')->nullable();
            $table->string('experience_required', 50)->nullable();
            $table->json('perks')->nullable();
            $table->enum('status', ['pending', 'active', 'rejected', 'closed'])->default('pending');
            $table->boolean('is_featured')->default(false);
            $table->integer('views_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_postings');
    }
};

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        // Identity
        'user_id', 'full_name', 'email', 'mobile_number', 'gender',
        'profile_photo', 'profile_photo_path', 'age',

        // Job Preference (Step 2)
        'seeking_position', 'job_title_id', 'location_id',
        'experience_type', 'exp_years', 'exp_months', 'total_experience', 'total_experience_years',

        // Location & Salary (Step 3)
        'preferred_locations', 'current_salary', 'expected_salary',

        // Skills & Languages (Step 4)
        'skills', 'skills_json', 'languages', 'description',

        // Education (Step 5)
        'education_level', 'college_name', 'degree_id', 'specialisation',
        'education_start_date', 'education_end_date', 'educations_json', 'highest_qualification',

        // Work Experience (Step 6)
        'company_name', 'industry_id', 'employment_type',
        'work_start_date', 'work_end_date', 'currently_working', 'notice_period',
        'experiences_json',

        // Resume & Availability (Step 0 & 7)
        'resume', 'resume_path', 'resume_skipped', 'availability',

        // Profile Tracking
        'profile_step', 'profile_completed',
    ];

    protected $casts = [
        'birthdate'           => 'date',
        'preferred_locations' => 'array',
        'skills_json'         => 'array',
        'languages'           => 'array',
        'educations_json'     => 'array',
        'experiences_json'    => 'array',
        'education_start_date' => 'date',
        'education_end_date'  => 'date',
        'work_start_date'     => 'date',
        'work_end_date'       => 'date',
        'currently_working'   => 'boolean',
        'resume_skipped'      => 'boolean',
        'profile_step'        => 'integer',
        'profile_completed'   => 'boolean',
    ];

    // ========================
    // RELATIONSHIPS
    // ========================

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function jobTitle()
    {
        return $this->belongsTo(Position::class, 'job_title_id');
    }

    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function employeeLanguages()
    {
        return $this->hasMany(EmployeeLanguage::class);
    }

    // ========================
    // HELPERS / ACCESSORS
    // ========================

    public function getFullNameAttribute($value)
    {
        return $value ?: ($this->user->full_name ?? $this->user->name ?? 'Not Set');
    }

    public function getEmailAttribute($value)
    {
        return $value ?: ($this->user->email ?? null);
    }

    public function getResumeUrlAttribute()
    {
        if ($this->attributes['resume'] ?? null) {
            return $this->attributes['resume'];
        }
        if ($this->resume_path) {
            return asset('storage/' . $this->resume_path);
        }
        return null;
    }

    public function getFormattedCurrentSalaryAttribute()
    {
        if (!$this->current_salary) return 'Not specified';
        return '₹ ' . number_format($this->current_salary, 0);
    }

    public function getFormattedExpectedSalaryAttribute()
    {
        if (!$this->expected_salary) return 'Not specified';
        return '₹ ' . number_format($this->expected_salary, 0);
    }

    /**
     * Next step for the app to navigate to
     */
    public function getNextStepAttribute(): string
    {
        $step = $this->profile_step ?? 0;
        $steps = [
            0 => 'upload_resume',
            1 => 'job_preference',
            2 => 'location_salary',
            3 => 'skills_languages',
            4 => 'education',
            5 => 'work_experience',
            6 => 'resume_availability',
            7 => 'complete',
        ];
        return $steps[$step + 1] ?? 'complete';
    }

    // ========================
    // SCOPES
    // ========================

    public function scopeActive($query)
    {
        return $query->whereHas('user', fn ($q) => $q->where('is_active', true));
    }

    public function scopeVerified($query)
    {
        return $query->whereHas('user', fn ($q) => $q->where('is_verified', true));
    }

    public function scopeProfileComplete($query)
    {
        return $query->where('profile_completed', true);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'user_id', 'full_name', 'email', 'mobile_number', 'gender', 'profile_photo',
        'age', 'location_id', 'job_title_id',
        'skills', 'skills_json', 'description',
        'total_experience', 'experience_type', 'exp_years', 'exp_months', 'total_experience_years',
        'current_salary', 'expected_salary', 'preferred_locations',
        'education_level', 'college_name', 'degree_id', 'specialisation',
        'education_start_date', 'education_end_date',
        'company_name', 'industry_id', 'employment_type',
        'work_start_date', 'work_end_date', 'currently_working', 'notice_period',
        'resume', 'availability', 'profile_step',
        // New JSON fields
        'educations_json', 'experiences_json', 'highest_qualification',
        
    ];

    protected $casts = [
        'birthdate' => 'date',
        'preferred_locations' => 'array',
        'skills_json' => 'array',
        'educations_json' => 'array',
        'experiences_json' => 'array',
        'education_start_date' => 'date',
        'education_end_date' => 'date',
        'work_start_date' => 'date',
        'work_end_date' => 'date',
        'currently_working' => 'boolean',
        'profile_step' => 'integer'
    ];

    // Relationships
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

    // Helper method to get educations as array
    public function getEducationsAttribute()
    {
        return $this->educations_json ?? [];
    }

    // Helper method to get experiences as array
    public function getExperiencesAttribute()
    {
        return $this->experiences_json ?? [];
    }

    public function languages()
    {
        return $this->hasMany(EmployeeLanguage::class);
    }

    // Accessor for full name
    public function getFullNameAttribute($value)
    {
        return $value ?: $this->user->name ?? 'Not Set';
    }

    // Accessor for email
    public function getEmailAttribute($value)
    {
        return $value ?: $this->user->email;
    }

    // Accessor for formatted salary
    public function getFormattedCurrentSalaryAttribute()
    {
        if (!$this->current_salary) return 'Not specified';
        return '₹ ' . number_format($this->current_salary, 2);
    }

    public function getFormattedExpectedSalaryAttribute()
    {
        if (!$this->expected_salary) return 'Not specified';
        return '₹ ' . number_format($this->expected_salary, 2);
    }

    // Accessor for resume URL
    public function getResumeUrlAttribute()
    {
        if ($this->resume) {
            return asset('storage/' . $this->resume);
        }
        return null;
    }

    // Scope for active employees
    public function scopeActive($query)
    {
        return $query->whereHas('user', function ($q) {
            $q->where('is_active', true);
        });
    }

    // Scope for verified employees
    public function scopeVerified($query)
    {
        return $query->whereHas('user', function ($q) {
            $q->where('is_verified', true);
        });
    }
}
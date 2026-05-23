<?php
// app/Models/JobPost.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $table = 'job_posts';

    protected $fillable = [
        'employer_id', 'company_name', 'job_title', 'job_title_id', 'job_type', 'is_night_shift',
        'work_location_type', 'office_address', 'job_city', 'field_work_area', 'floor_plot_no',
        'pay_type', 'min_fixed_salary', 'max_fixed_salary', 'avg_incentive', 'perks', 'other_perks',
        'minimum_education', 'english_level', 'experience_requirement', 'min_experience_years',
        'max_experience_years', 'degrees', 'skills', 'regional_languages', 'min_age', 'max_age',
        'gender_preference', 'prefer_applications_from', 'job_description', 'additional_requirements',
        'assets_required', 'contact_preference', 'other_recruiter_name', 'other_recruiter_whatsapp',
        'other_recruiter_email', 'candidate_contact_filter', 'whatsapp_alert_preference',
        'is_walkin_interview', 'interview_address', 'interview_date', 'interview_time',
        'status', 'published_at', 'expires_at'
    ];

    protected $casts = [
        'perks' => 'array',
        'degrees' => 'array',
        'skills' => 'array',
        'regional_languages' => 'array',
        'additional_requirements' => 'array',
        'assets_required' => 'array',
        'is_night_shift' => 'boolean',
        'is_walkin_interview' => 'boolean',
        'published_at' => 'datetime',
        'expires_at' => 'datetime',
        'interview_date' => 'date',
        'interview_time' => 'datetime',
    ];

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function jobTitle()
    {
        return $this->belongsTo(Position::class, 'job_title_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'published')
                     ->where(function($q) {
                         $q->whereNull('expires_at')
                           ->orWhere('expires_at', '>', now());
                     });
    }

    public function getSalaryRangeAttribute()
    {
        if ($this->pay_type == 'fixed') {
            return "₹ " . number_format($this->min_fixed_salary) . " - " . number_format($this->max_fixed_salary) . " per month";
        } elseif ($this->pay_type == 'fixed_incentive') {
            return "₹ " . number_format($this->min_fixed_salary) . " - " . number_format($this->max_fixed_salary) . " + Incentive per month";
        } else {
            return "Incentive only - Avg ₹ " . number_format($this->avg_incentive) . " per month";
        }
    }

    public function getExperienceRequiredAttribute()
    {
        if ($this->experience_requirement == 'fresher_only') {
            return 'Fresher Only (0-1 year)';
        } elseif ($this->experience_requirement == 'experienced_only') {
            return $this->min_experience_years . ' - ' . $this->max_experience_years . ' years';
        } else {
            return 'Any experience level';
        }
    }

    public function getWorkLocationTextAttribute()
    {
        switch($this->work_location_type) {
            case 'work_from_office':
                return 'Work from Office - ' . $this->office_address;
            case 'work_from_home':
                return 'Work from Home - ' . $this->job_city;
            case 'field_job':
                return 'Field Job - ' . $this->field_work_area;
            default:
                return 'Not specified';
        }
    }

    public function getPerksListAttribute()
    {
        $perks = $this->perks ?? [];
        if ($this->other_perks) {
            $otherPerks = array_map('trim', explode(',', $this->other_perks));
            $perks = array_merge($perks, $otherPerks);
        }
        return $perks;
    }
}
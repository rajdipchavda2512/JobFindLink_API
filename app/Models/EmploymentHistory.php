<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentHistory extends Model
{
    use HasFactory;

    protected $table = 'employment_histories';

    protected $fillable = [
        'employee_id',
        'company_name',
        'industry_sector',
        'currently_working',
        'employment_type',
        'notice_period',
        'start_date',
        'end_date'
    ];

    protected $casts = [
        'currently_working' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    // Relationship with Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // Accessor for duration
    public function getDurationAttribute()
    {
        $start = $this->start_date->format('M Y');
        $end = $this->currently_working ? 'Present' : ($this->end_date ? $this->end_date->format('M Y') : 'Present');
        return $start . ' - ' . $end;
    }

    // Accessor for experience in years
    public function getExperienceYearsAttribute()
    {
        $start = $this->start_date;
        $end = $this->currently_working ? now() : $this->end_date;
        
        if (!$end) return 0;
        
        $diff = $start->diff($end);
        return $diff->y + ($diff->m / 12);
    }

    // Accessor for formatted experience
    public function getFormattedExperienceAttribute()
    {
        $years = floor($this->experience_years);
        $months = round(($this->experience_years - $years) * 12);
        
        if ($years == 0 && $months == 0) return 'Less than 1 month';
        if ($years == 0) return $months . ' month' . ($months > 1 ? 's' : '');
        if ($months == 0) return $years . ' year' . ($years > 1 ? 's' : '');
        
        return $years . ' year' . ($years > 1 ? 's' : '') . ' ' . $months . ' month' . ($months > 1 ? 's' : '');
    }

    // Scope for full-time employees
    public function scopeFullTime($query)
    {
        return $query->where('employment_type', 'full-time');
    }

    // Scope for current jobs
    public function scopeCurrent($query)
    {
        return $query->where('currently_working', true);
    }

    // Employment type badges
    public function getEmploymentTypeBadgeAttribute()
    {
        $badges = [
            'full-time' => 'bg-green-100 text-green-800',
            'part-time' => 'bg-blue-100 text-blue-800',
            'contract' => 'bg-purple-100 text-purple-800',
            'internship' => 'bg-yellow-100 text-yellow-800'
        ];
        
        return $badges[$this->employment_type] ?? 'bg-gray-100 text-gray-800';
    }
}
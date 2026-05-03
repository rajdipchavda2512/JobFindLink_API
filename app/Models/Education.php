<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'employee_id',
        'education_level',
        'college_name',
        'degree',
        'specialisation',
        'start_date',
        'end_date'
    ];

    protected $casts = [
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
        $end = $this->end_date ? $this->end_date->format('M Y') : 'Present';
        return $start . ' - ' . $end;
    }

    // Accessor for year only
    public function getStartYearAttribute()
    {
        return $this->start_date->format('Y');
    }

    public function getEndYearAttribute()
    {
        return $this->end_date ? $this->end_date->format('Y') : 'Present';
    }

    // Scope for degree level
    public function scopeOfLevel($query, $level)
    {
        return $query->where('education_level', $level);
    }

    // Check if currently studying
    public function getIsCurrentAttribute()
    {
        return is_null($this->end_date);
    }
}
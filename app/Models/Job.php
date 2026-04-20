<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'job_postings';

    protected $fillable = [
        'employer_id',
        'category_id',
        'company_name',
        'title',
        'job_type',
        'location',
        'work_location_type',
        'pay_type',
        'salary_min',
        'salary_max',
        'description',
        'skills_required',
        'experience_required',
        'perks',
        'status',
        'is_featured',
        'views_count',
    ];

    protected function casts(): array
    {
        return [
            'skills_required' => 'array',
            'perks' => 'array',
            'is_featured' => 'boolean',
        ];
    }

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}

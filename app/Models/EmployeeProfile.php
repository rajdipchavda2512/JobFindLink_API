<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'experience_type',
        'experience_field',
        'preferred_locations',
        'job_position',
        'skills',
        'expected_salary',
        'age',
        'gender',
        'job_type',
        'availability',
        'resume_url',
        'resume_type',
        'id_document_url',
        'id_verified',
        'profile_complete',
        'resume_template',
        'resume_data',
        'id_document_back_url',
        'aadhaar_number_masked',
        'profile_visible',
        'show_mobile',
        'job_alerts',
        'application_updates',
        'promotions',
        'views_count',
    ];

    protected function casts(): array
    {
        return [
            'preferred_locations' => 'array',
            'skills' => 'array',
            'job_type' => 'array',
            'resume_data' => 'array',
            'id_verified' => 'boolean',
            'profile_complete' => 'boolean',
            'profile_visible' => 'boolean',
            'show_mobile' => 'boolean',
            'job_alerts' => 'boolean',
            'application_updates' => 'boolean',
            'promotions' => 'boolean',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

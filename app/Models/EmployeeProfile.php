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
    ];

    protected function casts(): array
    {
        return [
            'preferred_locations' => 'array',
            'skills' => 'array',
            'job_type' => 'array',
            'id_verified' => 'boolean',
            'profile_complete' => 'boolean',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'package_id',
        'starts_at',
        'expires_at',
        'jobs_used',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'starts_at' => 'datetime',
            'expires_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }

    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }

    public function canPostJob(): bool
    {
        return $this->is_active
            && !$this->isExpired()
            && $this->jobs_used < $this->package->job_posts_allowed;
    }
}

<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;
    use HasRoles;
    protected $fillable = [
        'name',
        'full_name',
        'email',
        'mobile',
        'password',
        'role',
        'is_verified',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_verified' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    // Relationships
    public function employeeProfile()
    {
        return $this->hasOne(EmployeeProfile::class);
    }

    public function employerProfile()
    {
        return $this->hasOne(EmployerProfile::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'employer_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'employee_id');
    }

    public function employerSubscriptions()
    {
        return $this->hasMany(EmployerSubscription::class, 'employer_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'employer_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    // Helpers
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isEmployer(): bool
    {
        return $this->role === 'employer';
    }

    public function isEmployee(): bool
    {
        return $this->role === 'employee';
    }

    public function activeSubscription()
    {
        return $this->employerSubscriptions()
            ->where('is_active', true)
            ->where('expires_at', '>', now())
            ->latest()
            ->first();
    }
}

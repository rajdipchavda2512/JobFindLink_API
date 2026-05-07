<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'full_name',
        'email',
        'mobile',
        'password',
        'role',
        'is_verified',
        'is_active',
        'mobile_verified_at',
        'profile_setup_complete',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at'      => 'datetime',
            'mobile_verified_at'     => 'datetime',
            'password'               => 'hashed',
            'is_verified'            => 'boolean',
            'is_active'              => 'boolean',
            'profile_setup_complete' => 'boolean',
        ];
    }

    // ========================
    // RELATIONSHIPS
    // ========================

    public function employeeProfile()
    {
        return $this->hasOne(EmployeeProfile::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
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

    // ========================
    // HELPERS / ACCESSORS
    // ========================

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

    /**
     * Check if user has a specific role
     */
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    /**
     * Check if user has any of the given roles
     */
    public function hasAnyRole(array|string ...$roles): bool
    {
        $roles = is_array($roles[0]) ? $roles[0] : $roles;
        return in_array($this->role, $roles);
    }
}

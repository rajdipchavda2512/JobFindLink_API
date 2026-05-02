<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table = 'languages';

    protected $fillable = [
        'name',
        'code'
    ];

    // Relationship with EmployeeLanguage
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_languages');
    }

    // Scope for active languages
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Get language name with code
    public function getFullNameAttribute()
    {
        return $this->code ? $this->name . ' (' . strtoupper($this->code) . ')' : $this->name;
    }
}
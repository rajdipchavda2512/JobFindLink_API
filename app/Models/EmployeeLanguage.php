<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLanguage extends Model
{
    use HasFactory;

    protected $table = 'employee_languages';

    protected $fillable = [
        'employee_id',
        'language_id'
    ];

    // Relationship with Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // Relationship with Language
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
<?php
// app/Models/Position.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';

    protected $fillable = [
        'name', 'description', 'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function jobPosts()
    {
        return $this->hasMany(JobPost::class, 'job_title_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
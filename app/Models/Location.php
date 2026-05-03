<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';

    protected $fillable = [
        'state',
        'city',
        'area'
    ];

    // Relationship with Employee
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    // Accessor for full address
    public function getFullAddressAttribute()
    {
        $parts = array_filter([$this->area, $this->city, $this->state]);
        return implode(', ', $parts);
    }

    // Scope for state
    public function scopeByState($query, $state)
    {
        return $query->where('state', $state);
    }

    // Scope for city
    public function scopeByCity($query, $city)
    {
        return $query->where('city', $city);
    }

    // Get all unique states
    public static function getStates()
    {
        return self::select('state')->distinct()->orderBy('state')->pluck('state');
    }

    // Get cities by state
    public static function getCitiesByState($state)
    {
        return self::where('state', $state)->select('city')->distinct()->orderBy('city')->pluck('city');
    }
}
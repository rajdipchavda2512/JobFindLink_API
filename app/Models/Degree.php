<?php
// app/Models/Degree.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
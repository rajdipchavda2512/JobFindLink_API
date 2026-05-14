<?php
// app/Models/Employer.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'employers';
    
    protected $fillable = [
        'mobile',
        'full_name',
        'email',
        'company_name',
        'company_area',
        'is_verified',
        'mobile_verified_at',
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
        'mobile_verified_at' => 'datetime',
        'is_verified' => 'boolean',
    ];

    public function sendOtp()
    {
        $otp = rand(100000, 999999);
        \Cache::put('employer_otp_' . $this->mobile, $otp, now()->addMinutes(5));
        // Here you would integrate SMS API
        // For now, we'll log it
        \Log::info('OTP for ' . $this->mobile . ': ' . $otp);
        return $otp;
    }

    public function verifyOtp($otp)
    {
        $cachedOtp = \Cache::get('employer_otp_' . $this->mobile);
        if ($cachedOtp && $cachedOtp == $otp) {
            $this->mobile_verified_at = now();
            $this->is_verified = true;
            $this->save();
            \Cache::forget('employer_otp_' . $this->mobile);
            return true;
        }
        return false;
    }
}
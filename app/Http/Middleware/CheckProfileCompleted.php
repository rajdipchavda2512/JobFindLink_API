<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Employer;

class CheckProfileCompleted
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Employee
        if ($user->role === 'employee') {

            $employee = Employee::where('user_id', $user->id)->first();

            if (!$employee || $employee->profile_step < 5) {

                if (!$request->routeIs('employee.complete.profile')) {

                    return redirect()->route('employee.complete.profile');
                }
            }
        }

        // Employer
        if ($user->role === 'employer') {

            $employer = Employer::where('user_id', $user->id)->first();

            if (!$employer || $employer->profile_step < 5) {

                if (!$request->routeIs('employer.complete.profile')) {

                    return redirect()->route('employer.complete.profile');
                }
            }
        }

        return $next($request);
    }
}
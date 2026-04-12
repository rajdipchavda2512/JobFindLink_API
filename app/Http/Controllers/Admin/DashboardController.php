<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use App\Models\Notification;
use App\Models\Package;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_employees' => User::where('role', 'employee')->count(),
            'total_employers' => User::where('role', 'employer')->count(),
            'total_jobs_posted' => Job::count(),
            'active_jobs' => Job::where('status', 'active')->count(),
            'pending_jobs' => Job::where('status', 'pending')->count(),
            'total_applications' => Application::count(),
            'revenue_total_inr' => Payment::where('status', 'success')->sum('amount'),
            'packages_sold' => Payment::where('status', 'success')->count(),
            'recent_jobs' => Job::with('employer')->latest()->take(5)->get(),
            'recent_applications' => Application::with(['job', 'employee'])->latest()->take(5)->get(),
            'recent_users' => User::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}

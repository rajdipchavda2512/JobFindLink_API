<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::with('employer');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('company_name', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        $jobs = $query->latest()->paginate(15);

        return view('admin.jobs.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        $job->load(['employer', 'applications.employee']);
        return view('admin.jobs.show', compact('job'));
    }

    public function approve(Job $job)
    {
        $job->update(['status' => 'active']);
        return back()->with('success', 'Job approved successfully.');
    }

    public function reject(Job $job)
    {
        $job->update(['status' => 'rejected']);
        return back()->with('success', 'Job rejected successfully.');
    }
}

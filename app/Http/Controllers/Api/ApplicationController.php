<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * GET /api/applications - List all applications by employee
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $applications = Application::where('employee_id', $user->id)
            ->with(['job.employer'])
            ->latest()
            ->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $applications,
        ]);
    }

    /**
     * GET /api/applications/{id}/status - Get application status detail
     */
    public function status(Application $application)
    {
        $application->load(['job.employer']);

        return response()->json([
            'success' => true,
            'data' => $application,
        ]);
    }

    /**
     * PUT /api/applications/{id}/status - Update applicant status (employer)
     */
    public function updateStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|in:applied,under_review,shortlisted,rejected,hired',
        ]);

        $user = $request->user();

        // Check if user owns the job
        if ($application->job->employer_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized.',
            ], 403);
        }

        $application->update(['status' => $request->status]);

        // TODO: Trigger appropriate notifications based on status change

        return response()->json([
            'success' => true,
            'message' => 'Application status updated.',
            'data' => $application->fresh(),
        ]);
    }
}

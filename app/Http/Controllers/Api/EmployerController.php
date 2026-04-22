<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\EmployerProfile;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class EmployerController extends Controller
{
    /**
     * GET /api/employer/profile
     *
     * Matches Employer Profile screen:
     * - Company Details, Contact Person, Work Email, Website
     * - Documents, Subscription info, Analytics summary
     */
    public function getProfile(Request $request)
    {
        $user = $request->user();
        $profile = $user->employerProfile;
        $subscription = $user->activeSubscription();

        return response()->json([
            'success' => true,
            'data' => [
                'company_name' => $profile->company_name ?? null,
                'work_email' => $profile->work_email ?? null,
                'industry_type' => $profile->industry_type ?? null,
                'company_size' => $profile->company_size ?? null,
                'company_website' => $profile->company_website ?? null,
                'company_description' => $profile->company_description ?? null,
                'employer_designation' => $profile->employer_designation ?? null,
                'is_verified' => (bool) $user->is_verified,
                'documents' => $profile->documents ?? null,
            ],
        ]);
    }

    /**
     * PUT /api/employer/profile
     *
     * Matches Employer Register & Edit Profile screen
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:150',
            'work_email' => 'nullable|email|max:100',
            'industry_type' => 'nullable|string|max:100',
            'company_size' => 'nullable|string|max:50',
            'company_website' => 'nullable|string|max:255',
            'company_description' => 'nullable|string',
            'employer_designation' => 'nullable|string|max:100',
        ]);

        $user = $request->user();

        $profile = EmployerProfile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'company_name' => $request->company_name,
                'work_email' => $request->work_email,
                'industry_type' => $request->industry_type,
                'company_size' => $request->company_size,
                'company_website' => $request->company_website,
                'company_description' => $request->company_description,
                'employer_designation' => $request->employer_designation,
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Employer profile updated successfully.',
            'data' => $profile->fresh(),
        ]);
    }

    /**
     * POST /api/employer/upload-document
     *
     * Matches Employer Register screen:
     * - GST Certificate upload
     * - Registration Certificate upload
     */
    public function uploadDocument(Request $request)
    {
        $request->validate([
            'document' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'document_type' => 'required|in:gst_certificate,registration_certificate,other',
        ]);

        $user = $request->user();
        $path = $request->file('document')->store('employer-documents', 'public');

        $profile = EmployerProfile::updateOrCreate(
            ['user_id' => $user->id],
            []
        );

        // Store document reference
        $documents = $profile->documents ?? [];
        $documents[] = [
            'type' => $request->document_type,
            'url' => Storage::url($path),
            'file_name' => $request->file('document')->getClientOriginalName(),
            'file_size' => $request->file('document')->getSize(),
            'uploaded_at' => now()->toIso8601String(),
            'verified' => false,
        ];

        $profile->update(['documents' => $documents]);

        return response()->json([
            'success' => true,
            'message' => ucfirst(str_replace('_', ' ', $request->document_type)) . ' uploaded successfully.',
            'data' => [
                'document_url' => Storage::url($path),
                'documents' => $profile->fresh()->documents,
            ],
        ]);
    }

    /**
     * GET /api/employer/dashboard
     *
     * Matches Employer Dashboard screen:
     * - Stats: Jobs Posted (20), Applications (340), Approached (78), Job Views (1.2K)
     * - Applications This Week bar chart data
     * - Application Status donut chart data
     * - Active Job Posts list
     */
    public function dashboard(Request $request)
    {
        $user = $request->user();

        $totalJobs = $user->jobs()->count();
        $activeJobs = $user->jobs()->where('status', 'active')->count();
        $pendingJobs = $user->jobs()->where('status', 'pending')->count();

        // Get all job IDs for this employer
        $jobIds = $user->jobs()->pluck('id');

        $totalApplications = Application::whereIn('job_id', $jobIds)->count();
        $totalViews = $user->jobs()->sum('views_count');

        // Application status breakdown (for donut chart)
        $statusBreakdown = [
            'pending' => Application::whereIn('job_id', $jobIds)->where('status', 'applied')->count(),
            'under_review' => Application::whereIn('job_id', $jobIds)->where('status', 'under_review')->count(),
            'shortlisted' => Application::whereIn('job_id', $jobIds)->where('status', 'shortlisted')->count(),
            'hired' => Application::whereIn('job_id', $jobIds)->where('status', 'hired')->count(),
            'rejected' => Application::whereIn('job_id', $jobIds)->where('status', 'rejected')->count(),
        ];

        // Weekly application chart data (last 7 days)
        $weeklyData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $count = Application::whereIn('job_id', $jobIds)
                ->whereDate('created_at', $date)
                ->count();
            $weeklyData[] = [
                'day' => $date->format('D'),
                'date' => $date->toDateString(),
                'count' => $count,
            ];
        }

        // Active job posts with application counts
        $activeJobPosts = $user->jobs()
            ->where('status', 'active')
            ->withCount('applications')
            ->latest()
            ->take(5)
            ->get()
            ->map(function ($job) {
                return [
                    'id' => $job->id,
                    'title' => $job->title,
                    'company_name' => $job->company_name,
                    'applications_count' => $job->applications_count,
                    'views_count' => $job->views_count ?? 0,
                    'status' => $job->status,
                    'created_at' => $job->created_at->diffForHumans(),
                ];
            });

        $subscription = $user->activeSubscription();

        return response()->json([
            'success' => true,
            'data' => [
                'stats' => [
                    'total_jobs' => $totalJobs,
                    'active_jobs' => $activeJobs,
                    'pending_jobs' => $pendingJobs,
                    'total_applications' => $totalApplications,
                    'total_views' => $totalViews,
                ],
                'status_breakdown' => $statusBreakdown,
                'weekly_applications' => $weeklyData,
                'active_job_posts' => $activeJobPosts,
                'subscription' => $subscription ? [
                    'package_name' => $subscription->package->name,
                    'jobs_used' => $subscription->jobs_used,
                    'jobs_allowed' => $subscription->package->job_posts_allowed,
                    'expires_at' => $subscription->expires_at->toDateTimeString(),
                ] : null,
            ],
        ]);
    }

    /**
     * GET /api/employer/jobs
     *
     * Matches Active Job Posts in Dashboard + Manage Job screen
     */
    public function myJobs(Request $request)
    {
        $query = $request->user()->jobs()->withCount('applications');

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $jobs = $query->latest()->paginate(15);

        $formatted = collect($jobs->items())->map(function ($job) {
            return [
                'id' => $job->id,
                'title' => $job->title,
                'job_type' => $job->job_type,
                'location' => $job->location,
                'work_location_type' => $job->work_location_type,
                'salary_min' => $job->salary_min,
                'salary_max' => $job->salary_max,
                'status' => $job->status,
                'total_applications' => $job->applications_count,
                'views' => $job->views_count ?? 0,
                'posted_at' => $job->created_at->toIso8601String(),
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $formatted,
            'meta' => [
                'current_page' => $jobs->currentPage(),
                'total' => $jobs->total(),
                'per_page' => $jobs->perPage()
            ]
        ]);
    }

    /**
     * GET /api/employer/subscription
     *
     * Matches Subscription Details screen:
     * - Current plan info
     * - Usage: Jobs Posted, Resumes Viewed, Bulk SMS
     * - Active Since, Renews, Jobs used
     */
    public function subscription(Request $request)
    {
        $user = $request->user();
        $activeSubscription = $user->activeSubscription();

        $allSubscriptions = $user->employerSubscriptions()
            ->with('package')
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'active' => $activeSubscription ? [
                    'id' => $activeSubscription->id,
                    'package_name' => $activeSubscription->package->name,
                    'price' => $activeSubscription->package->price,
                    'starts_at' => $activeSubscription->starts_at->toDateString(),
                    'expires_at' => $activeSubscription->expires_at->toDateString(),
                    'jobs_used' => $activeSubscription->jobs_used,
                    'jobs_allowed' => $activeSubscription->package->job_posts_allowed,
                    'resumes_viewed' => $activeSubscription->resumes_viewed ?? 0,
                    'resumes_allowed' => $activeSubscription->package->candidate_db_access ?? 999,
                    'sms_used' => $activeSubscription->sms_used ?? 0,
                    'sms_allowed' => $activeSubscription->package->bulk_sms_credits ?? 0,
                    'is_active' => $activeSubscription->is_active,
                ] : null,
                'history' => $allSubscriptions,
            ],
        ]);
    }

    /**
     * PUT /api/employer/settings
     *
     * Matches Employer Settings screen:
     * - Application Alerts, Weekly Reports, Candidate Msgs toggles
     */
    public function updateSettings(Request $request)
    {
        $request->validate([
            'application_alerts' => 'nullable|boolean',
            'weekly_reports' => 'nullable|boolean',
            'candidate_messages' => 'nullable|boolean',
        ]);

        $user = $request->user();

        $profile = EmployerProfile::updateOrCreate(
            ['user_id' => $user->id],
            array_filter($request->only([
                'application_alerts', 'weekly_reports', 'candidate_messages',
            ]), fn ($v) => $v !== null)
        );

        return response()->json([
            'success' => true,
            'message' => 'Settings updated successfully.',
            'data' => $profile->fresh(),
        ]);
    }

    /**
     * GET /api/employer/applications
     */
    public function employerApplications(Request $request)
    {
        $user = $request->user();
        
        $query = Application::whereHas('job', function ($q) use ($user) {
            $q->where('employer_id', $user->id);
        })->with(['employee', 'job']);

        if ($request->filled('job_id')) {
            $query->where('job_id', $request->job_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $applications = $query->latest()->paginate(15);

        $formatted = collect($applications->items())->map(function ($app) {
            return [
                'id' => $app->id,
                'applicant' => $app->employee ? [
                    'id' => $app->employee->id,
                    'full_name' => $app->employee->full_name,
                    'mobile' => $app->employee->mobile,
                    'email' => $app->employee->email,
                ] : null,
                'job' => $app->job ? [
                    'id' => $app->job->id,
                    'title' => $app->job->title,
                ] : null,
                'status' => $app->status,
                'cover_note' => $app->cover_note,
                'apply_method' => $app->apply_method ?? 'existing',
                'applied_at' => $app->created_at->toIso8601String(),
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $formatted,
            'meta' => [
                'current_page' => $applications->currentPage(),
                'total' => $applications->total(),
                'per_page' => $applications->perPage()
            ]
        ]);
    }

    /**
     * PUT /api/employer/applications/{id}/status
     */
    public function updateApplicationStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,under_review,shortlisted,hired,rejected',
        ]);

        $user = $request->user();
        
        $application = Application::find($id);

        if (!$application) {
            return response()->json(['success' => false, 'message' => 'Application not found.'], 404);
        }

        if ($application->job->employer_id !== $user->id) {
            return response()->json(['success' => false, 'message' => 'Unauthorized.'], 403);
        }

        $application->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Application status updated.',
            'data' => ['status' => $application->status],
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\EmployeeProfile;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * POST /api/jobs - Post a new job (employer)
     *
     * Matches Post Job screen in mockup:
     * - Job Details: title, category, job type (full-time/part-time), work mode (office/WFH/hybrid)
     * - Compensation: pay type (salary range/fixed/negotiable), min/max salary, experience
     * - Skills Required: array of skills
     * - Job Description: rich text
     * - Perks & Benefits: array
     * - Application Settings: deadline, max applicants
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'category_id' => 'nullable|exists:categories,id',
            'job_type' => 'required|in:full-time,part-time,freelance,shift',
            'location' => 'required|string|max:100',
            'work_location_type' => 'required|in:wfh,wfo,hybrid,field',
            'pay_type' => 'required|in:fixed,range,negotiable',
            'salary_min' => 'nullable|integer',
            'salary_max' => 'nullable|integer',
            'description' => 'nullable|string',
            'skills_required' => 'nullable|array',
            'experience_required' => 'nullable|string|max:50',
            'perks' => 'nullable|array',
            'application_deadline' => 'nullable|date|after:today',
            'max_applicants' => 'nullable|integer|min:1',
            'is_draft' => 'nullable|boolean',
        ]);

        $user = $request->user();

        // Don't check subscription for drafts
        if (!$request->is_draft) {
            // Check active subscription
            $subscription = $user->activeSubscription();
            if (!$subscription) {
                return response()->json([
                    'success' => false,
                    'message' => 'No active subscription. Please purchase a package first.',
                ], 403);
            }

            if (!$subscription->canPostJob()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Job posting limit reached for your current plan.',
                ], 403);
            }
        }

        $employerProfile = $user->employerProfile;
        $companyName = $employerProfile ? $employerProfile->company_name : $user->full_name;

        $job = Job::create([
            'employer_id' => $user->id,
            'category_id' => $request->category_id,
            'company_name' => $companyName,
            'title' => $request->title,
            'job_type' => $request->job_type,
            'location' => $request->location,
            'work_location_type' => $request->work_location_type,
            'pay_type' => $request->pay_type,
            'salary_min' => $request->salary_min,
            'salary_max' => $request->salary_max,
            'description' => $request->description,
            'skills_required' => $request->skills_required,
            'experience_required' => $request->experience_required,
            'perks' => $request->perks,
            'application_deadline' => $request->application_deadline,
            'max_applicants' => $request->max_applicants,
            'status' => $request->is_draft ? 'draft' : 'pending',
            'is_featured' => !$request->is_draft && isset($subscription)
                ? $subscription->package->featured_listing
                : false,
        ]);

        // Increment jobs used only for published (non-draft) posts
        if (!$request->is_draft && isset($subscription)) {
            $subscription->increment('jobs_used');
        }

        return response()->json([
            'success' => true,
            'message' => $request->is_draft
                ? 'Job saved as draft.'
                : 'Job posted successfully. Pending admin approval.',
            'data' => $job,
        ], 201);
    }

    /**
     * GET /api/jobs/matching - Get matched jobs for employee
     *
     * Matches Recommended section in Employee Dashboard
     */
    public function matching(Request $request)
    {
        $user = $request->user();
        $profile = $user->employeeProfile;

        $query = Job::where('status', 'active');

        if ($profile) {
            if ($profile->preferred_locations) {
                $query->where(function ($q) use ($profile) {
                    foreach ($profile->preferred_locations as $location) {
                        $q->orWhere('location', 'like', "%{$location}%");
                    }
                });
            }

            if ($profile->job_type) {
                $query->whereIn('job_type', $profile->job_type);
            }

            if ($profile->expected_salary) {
                $query->where(function ($q) use ($profile) {
                    $q->where('salary_max', '>=', $profile->expected_salary)
                      ->orWhereNull('salary_max');
                });
            }

            // Match by skills
            if ($profile->skills) {
                $query->where(function ($q) use ($profile) {
                    foreach ($profile->skills as $skill) {
                        $q->orWhereJsonContains('skills_required', $skill);
                    }
                });
            }
        }

        // Filter by category if provided
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $jobs = $query->with('category')->latest()->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $jobs,
        ]);
    }

    /**
     * GET /api/jobs/search - Search jobs with filters
     *
     * Matches Search bar + Filter in Dashboard header
     */
    public function index(Request $request)
    {
        $query = Job::where('status', 'active');

        if ($request->filled('q')) {
            $searchTerm = $request->q;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', "%{$searchTerm}%")
                  ->orWhere('company_name', 'like', "%{$searchTerm}%")
                  ->orWhere('location', 'like', "%{$searchTerm}%")
                  ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }
        if ($request->filled('title')) $query->where('title', 'like', "%{$request->title}%");
        if ($request->filled('company')) $query->where('company_name', 'like', "%{$request->company}%");
        if ($request->filled('location')) $query->where('location', 'like', "%{$request->location}%");
        if ($request->filled('job_type')) $query->where('job_type', $request->job_type);
        if ($request->filled('salary_min')) $query->where('salary_max', '>=', $request->salary_min);
        if ($request->filled('work_location_type')) $query->where('work_location_type', $request->work_location_type);
        if ($request->filled('category_id')) $query->where('category_id', $request->category_id);
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->category}%");
            });
        }

        $perPage = $request->input('per_page', 15);
        $jobs = $query->latest()->paginate($perPage);

        $user = auth('sanctum')->user();
        $savedJobIds = [];
        if ($user && $user->role === 'employee') {
            $savedJobIds = \App\Models\SavedJob::where('employee_id', $user->id)
                ->pluck('job_id')->toArray();
        }

        $formatted = collect($jobs->items())->map(function ($job) use ($savedJobIds) {
            return [
                'id' => $job->id,
                'title' => $job->title,
                'company_name' => $job->company_name,
                'location' => $job->location,
                'work_location_type' => $job->work_location_type,
                'job_type' => $job->job_type,
                'salary_min' => $job->salary_min,
                'salary_max' => $job->salary_max,
                'is_saved' => in_array($job->id, $savedJobIds),
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

    public function toggleSave(Request $request, Job $job)
    {
        $user = $request->user();

        if ($user->role !== 'employee') {
            return response()->json(['success' => false, 'message' => 'Only employees can save jobs.'], 403);
        }

        $savedJob = \App\Models\SavedJob::where('employee_id', $user->id)
            ->where('job_id', $job->id)
            ->first();

        if ($savedJob) {
            $savedJob->delete();
            return response()->json([
                'success' => true,
                'saved' => false,
                'message' => 'Job unsaved successfully.',
            ]);
        }

        \App\Models\SavedJob::create([
            'employee_id' => $user->id,
            'job_id' => $job->id,
        ]);

        return response()->json([
            'success' => true,
            'saved' => true,
            'message' => 'Job saved successfully.',
        ]);
    }

    /**
     * GET /api/jobs/{id} - Get single job detail
     *
     * Matches Job Apply screen: title, company, salary, tags, description, skills
     */
    public function show(Job $job)
    {
        if ($job->status !== 'active') {
            return response()->json([
                'success' => false,
                'message' => 'Job not found or not active.',
            ], 404);
        }

        $job->increment('views_count');
        $job->load(['employer.employerProfile', 'category']);

        $user = auth('sanctum')->user();
        $isSaved = false;
        $alreadyApplied = false;

        if ($user && $user->role === 'employee') {
            $isSaved = \App\Models\SavedJob::where('employee_id', $user->id)
                ->where('job_id', $job->id)->exists();
            $alreadyApplied = Application::where('employee_id', $user->id)
                ->where('job_id', $job->id)->exists();
        }

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $job->id,
                'title' => $job->title,
                'description' => $job->description,
                'requirements' => implode(', ', $job->skills_required ?? []) . ($job->experience_required ? ' (' . $job->experience_required . ')' : ''),
                'company_name' => $job->company_name,
                'company_logo' => $job->employer->employerProfile ? $job->employer->employerProfile->company_logo : null,
                'location' => $job->location,
                'work_location_type' => $job->work_location_type,
                'job_type' => $job->job_type,
                'salary_min' => $job->salary_min,
                'salary_max' => $job->salary_max,
                'is_saved' => $isSaved,
                'already_applied' => $alreadyApplied,
                'posted_at' => $job->created_at->toIso8601String(),
                'expires_at' => $job->application_deadline ?? Carbon\Carbon::parse($job->created_at)->addDays(30)->toIso8601String(),
            ],
        ]);
    }

    /**
     * POST /api/jobs/{id}/apply - Apply to a job
     *
     * Matches Apply screen:
     * - Choose apply method: existing resume, built resume, upload new
     * - Cover note optional
     */
    public function apply(Request $request, Job $job)
    {
        $request->validate([
            'apply_method' => 'nullable|in:existing,built,upload',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'cover_note' => 'nullable|string|max:500',
        ]);

        $user = $request->user();

        if ($job->status !== 'active') {
            return response()->json([
                'success' => false,
                'message' => 'This job is not accepting applications.',
            ], 422);
        }

        // Check deadline
        if ($job->application_deadline && now()->gt($job->application_deadline)) {
            return response()->json([
                'success' => false,
                'message' => 'Application deadline has passed.',
            ], 422);
        }

        // Check max applicants
        if ($job->max_applicants && $job->applications()->count() >= $job->max_applicants) {
            return response()->json([
                'success' => false,
                'message' => 'Maximum applicants limit reached for this job.',
            ], 422);
        }

        $employeeProfile = $user->employeeProfile;

        // Mandatory Feature 1: Resume is required
        if (!$employeeProfile || (!$employeeProfile->resume_url && $employeeProfile->resume_type !== 'built')) {
            // Allow upload in same request
            if (!$request->hasFile('resume')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Mandatory: You must upload or build a resume before applying.',
                ], 403);
            }
        }

        // Mandatory Feature 2: Govt ID Verification
        if (!$employeeProfile->id_document_url) {
            return response()->json([
                'success' => false,
                'message' => 'Mandatory: You must upload a Govt ID (Aadhar/PAN) before applying.',
            ], 403);
        }

        // Check if already applied
        $existing = Application::where('job_id', $job->id)
            ->where('employee_id', $user->id)
            ->first();

        if ($existing) {
            return response()->json([
                'success' => false,
                'message' => 'You have already applied to this job.',
            ], 422);
        }

        // Handle resume upload if provided
        $resumeUrl = $employeeProfile->resume_url;
        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
            $resumeUrl = \Storage::url($path);
            $employeeProfile->update([
                'resume_url' => $resumeUrl,
                'resume_type' => 'uploaded',
            ]);
        }

        $application = Application::create([
            'job_id' => $job->id,
            'employee_id' => $user->id,
            'status' => 'applied',
            'applied_at' => now(),
            'cover_note' => $request->cover_note,
            'resume_url' => $resumeUrl,
            'apply_method' => $request->apply_method ?? 'existing',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Application submitted successfully.',
            'data' => $application,
        ], 201);
    }

    /**
     * PUT /api/jobs/{job} - Edit job (employer)
     */
    public function update(Request $request, Job $job)
    {
        $user = $request->user();

        if ($job->employer_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized.',
            ], 403);
        }

        $request->validate([
            'title' => 'sometimes|string|max:100',
            'category_id' => 'nullable|exists:categories,id',
            'job_type' => 'sometimes|in:full-time,part-time,freelance,shift',
            'location' => 'sometimes|string|max:100',
            'work_location_type' => 'sometimes|in:wfh,wfo,hybrid,field',
            'pay_type' => 'sometimes|in:fixed,range,negotiable',
            'salary_min' => 'nullable|integer',
            'salary_max' => 'nullable|integer',
            'description' => 'nullable|string',
            'skills_required' => 'nullable|array',
            'experience_required' => 'nullable|string|max:50',
            'perks' => 'nullable|array',
            'application_deadline' => 'nullable|date',
            'max_applicants' => 'nullable|integer|min:1',
        ]);

        $job->update($request->only([
            'title', 'category_id', 'job_type', 'location', 'work_location_type',
            'pay_type', 'salary_min', 'salary_max', 'description',
            'skills_required', 'experience_required', 'perks',
            'application_deadline', 'max_applicants',
        ]));

        if ($request->has('is_draft')) {
            $status = filter_var($request->is_draft, FILTER_VALIDATE_BOOLEAN) ? 'draft' : 'pending';
            $job->update(['status' => $status]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Job updated successfully.',
            'data' => $job->fresh(),
        ]);
    }

    /**
     * PUT /api/jobs/{job}/status - Pause/Resume/Close job
     *
     * Matches Manage Job screen buttons: Pause, Close Job
     */
    public function updateStatus(Request $request, Job $job)
    {
        $user = $request->user();

        if ($job->employer_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized.',
            ], 403);
        }

        $request->validate([
            'status' => 'required|in:active,paused,draft,closed',
        ]);

        $job->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Job ' . $request->status . ' successfully.',
            'data' => ['status' => $job->status],
        ]);
    }

    /**
     * DELETE /api/jobs/{job} - Close/delete job (employer)
     */
    public function destroy(Request $request, Job $job)
    {
        $user = $request->user();

        if ($job->employer_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized.',
            ], 403);
        }

        $job->delete();

        return response()->json([
            'success' => true,
            'message' => 'Job deleted successfully.',
        ]);
    }

    /**
     * GET /api/jobs/{job}/applicants - View applicants (employer)
     *
     * Matches Manage Job > Applicants tab:
     * - List with avatar, name, experience, status pills
     * - Status: Shortlisted, Pending, Hired, Rejected
     */
    public function applicants(Request $request, Job $job)
    {
        $user = $request->user();

        if ($job->employer_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized.',
            ], 403);
        }

        $query = $job->applications()->with(['employee.employeeProfile']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $applicants = $query->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $applicants,
        ]);
    }

    /**
     * GET /api/jobs/{job}/analytics - Job analytics (employer)
     *
     * Matches Manage Job > Analytics tab:
     * - Views vs Applications chart
     * - Total Views, Total Applications, Avg Match Score, Conversion Rate
     */
    public function analytics(Request $request, Job $job)
    {
        $user = $request->user();

        if ($job->employer_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized.',
            ], 403);
        }

        $totalViews = $job->views_count ?? 0;
        $totalApplications = $job->applications()->count();
        $conversionRate = $totalViews > 0
            ? round(($totalApplications / $totalViews) * 100, 1)
            : 0;

        // Weekly views vs applications data
        $weeklyData = [];
        for ($w = 3; $w >= 0; $w--) {
            $weekStart = now()->subWeeks($w)->startOfWeek();
            $weekEnd = now()->subWeeks($w)->endOfWeek();

            $apps = $job->applications()
                ->whereBetween('created_at', [$weekStart, $weekEnd])
                ->count();

            $weeklyData[] = [
                'week' => 'W' . (4 - $w),
                'applications' => $apps,
            ];
        }

        return response()->json([
            'success' => true,
            'data' => [
                'total_views' => $totalViews,
                'total_applications' => $totalApplications,
                'conversion_rate' => $conversionRate . '%',
                'weekly_data' => $weeklyData,
                'status_breakdown' => [
                    'applied' => $job->applications()->where('status', 'applied')->count(),
                    'shortlisted' => $job->applications()->where('status', 'shortlisted')->count(),
                    'hired' => $job->applications()->where('status', 'hired')->count(),
                    'rejected' => $job->applications()->where('status', 'rejected')->count(),
                ],
            ],
        ]);
    }
}

<?php

use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\EmployeeProfileController;
use App\Http\Controllers\Api\EmployerController;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\PackageController;
use App\Http\Controllers\Api\PositionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes — JobFindLink v2
|--------------------------------------------------------------------------
*/

// ============================================================
// HEALTH CHECK
// ============================================================
Route::get('/ping', fn () => response()->json(['success' => true, 'message' => 'JobFindLink API v2 is running.']));

// ============================================================
// AUTH MODULE
// ============================================================
Route::prefix('auth')->group(function () {

    // --- Step 1: Send OTP (all users, 10-digit mobile) ---
    Route::post('/send-otp',   [AuthController::class, 'sendOtp']);
    Route::post('/resend-otp', [AuthController::class, 'resendOtp']);

    // --- Step 2: Verify OTP ---
    // Existing user  → logs in directly, returns access_token + full profile + next_screen
    // New user       → returns temp_token for registration
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);

    // --- Step 3: Registration (after OTP, new users only) ---
    Route::post('/employee/register', [AuthController::class, 'employeeRegister']); // mobile + temp_token
    Route::post('/employer/register', [AuthController::class, 'employerRegister']); // mobile + temp_token + company fields

    // --- Login Shortcuts ---
    // Universal mobile OTP login (Employee OR Employer)
    Route::post('/login/otp',      [AuthController::class, 'loginWithOtp']);
    // Employer can also login with Email + Password
    Route::post('/employer/login', [AuthController::class, 'employerLogin']);

    // --- Password Reset (both roles can use mobile OTP) ---
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/reset-password',  [AuthController::class, 'resetPassword']);

    // --- Authenticated Auth Actions ---
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/profile',         [AuthController::class, 'myProfile']);
        Route::post('/logout',         [AuthController::class, 'logout']);
        Route::post('/refresh-token',  [AuthController::class, 'refreshToken']);
        Route::post('/change-password', [AuthController::class, 'changePassword']);
        Route::post('/change-mobile',  [AuthController::class, 'changeMobile']);
    });
});

// ============================================================
// PUBLIC ROUTES
// ============================================================

// Packages
Route::get('/packages', [PackageController::class, 'index']);
Route::post('/payments/webhook', [PackageController::class, 'webhook']);

// Categories
Route::get('/categories',                    [CategoryController::class, 'index']);
Route::get('/categories/{category}',         [CategoryController::class, 'show']);
Route::get('/categories/{category}/jobs',    [CategoryController::class, 'jobs']);

// Location / Master Data
Route::get('/locations/gujarat-districts',   [LocationController::class, 'gujaratDistricts']);

// Positions (public read)
Route::get('/positions',            [PositionController::class, 'index']);
Route::get('/positions/{position}', [PositionController::class, 'show']);

// Jobs (public read)
Route::get('/jobs',          [JobController::class, 'index']);
Route::get('/jobs/search',   [JobController::class, 'search']);
Route::get('/jobs/{job}',    [JobController::class, 'show']);

// ============================================================
// AUTHENTICATED ROUTES
// ============================================================
Route::middleware('auth:sanctum')->group(function () {

    // ============================================================
    // EMPLOYEE PROFILE SETUP (7-Step Flow)
    // ============================================================
    Route::prefix('employee/profile')->middleware('role:employee')->group(function () {
        Route::get('/',          [EmployeeProfileController::class, 'getFullProfile']);     // GET  full profile
        Route::post('/upload-resume', [EmployeeProfileController::class, 'uploadResume']); // STEP 0: Resume upload (optional)
        Route::post('/step/1',   [EmployeeProfileController::class, 'step1BasicDetails']); // Basic Details
        Route::post('/step/2',   [EmployeeProfileController::class, 'step2JobPreference']); // Job Preference
        Route::post('/step/3',   [EmployeeProfileController::class, 'step3LocationSalary']); // Location & Salary
        Route::post('/step/4',   [EmployeeProfileController::class, 'step4SkillsLanguages']); // Skills & Languages
        Route::post('/step/5',   [EmployeeProfileController::class, 'step5Education']);    // Education (optional)
        Route::post('/step/6',   [EmployeeProfileController::class, 'step6WorkExperience']); // Work Experience (optional)
        Route::post('/step/7',   [EmployeeProfileController::class, 'step7ResumeAvailability']); // Final: Resume & Availability
    });

    // ============================================================
    // EMPLOYEE MODULE
    // ============================================================
    Route::prefix('employee')->middleware('role:employee')->group(function () {
        Route::get('/dashboard',      [EmployeeController::class, 'dashboard']);
        Route::get('/profile',        [EmployeeController::class, 'getProfile']);
        Route::put('/profile',        [EmployeeController::class, 'updateProfile']);
        Route::post('/upload-resume', [EmployeeController::class, 'uploadResume']);
        Route::post('/build-resume',  [EmployeeController::class, 'buildResume']);
        Route::post('/verify-id',     [EmployeeController::class, 'verifyId']);
        Route::get('/applications',   [EmployeeController::class, 'myApplications']);
        Route::get('/saved-jobs',     [EmployeeController::class, 'savedJobs']);
        Route::put('/settings',       [EmployeeController::class, 'updateSettings']);
    });

    // ============================================================
    // EMPLOYER MODULE
    // ============================================================
    Route::prefix('employer')->middleware('role:employer')->group(function () {
        Route::get('/dashboard',                                    [EmployerController::class, 'dashboard']);
        Route::get('/profile',                                      [EmployerController::class, 'getProfile']);
        Route::put('/profile',                                      [EmployerController::class, 'updateProfile']);
        Route::post('/upload-document',                             [EmployerController::class, 'uploadDocument']);
        Route::get('/jobs',                                         [EmployerController::class, 'myJobs']);
        Route::get('/applications',                                 [EmployerController::class, 'employerApplications']);
        Route::put('/applications/{application}/status',            [EmployerController::class, 'updateApplicationStatus']);
        Route::get('/subscription',                                 [EmployerController::class, 'subscription']);
        Route::put('/settings',                                     [EmployerController::class, 'updateSettings']);
    });

    // ============================================================
    // JOB MODULE
    // ============================================================
    Route::get('/jobs/matching',         [JobController::class, 'matching']);
    Route::post('/jobs/{job}/apply',     [JobController::class, 'apply']);
    Route::post('/jobs/{job}/save',      [JobController::class, 'toggleSave'])->middleware('role:employee');

    // Employer-only job management
    Route::middleware('role:employer')->group(function () {
        Route::post('/jobs',                     [JobController::class, 'store']);
        Route::put('/jobs/{job}',                [JobController::class, 'update']);
        Route::put('/jobs/{job}/status',         [JobController::class, 'updateStatus']);
        Route::delete('/jobs/{job}',             [JobController::class, 'destroy']);
        Route::get('/jobs/{job}/applicants',     [JobController::class, 'applicants']);
        Route::get('/jobs/{job}/analytics',      [JobController::class, 'analytics']);
    });

    // ============================================================
    // APPLICATION MODULE
    // ============================================================
    Route::get('/applications',                                 [ApplicationController::class, 'index']);
    Route::get('/applications/{application}/status',            [ApplicationController::class, 'status']);

    // ============================================================
    // PAYMENT MODULE
    // ============================================================
    Route::post('/payments/checkout',   [PackageController::class, 'checkout']);
    Route::get('/candidates/search',    [PackageController::class, 'searchCandidates'])->middleware('role:employer');

    // ============================================================
    // NOTIFICATION MODULE
    // ============================================================
    Route::get('/notifications',                            [NotificationController::class, 'index']);
    Route::get('/notifications/unread-count',               [NotificationController::class, 'unreadCount']);
    Route::put('/notifications/read-all',                   [NotificationController::class, 'markAllAsRead']);
    Route::put('/notifications/{notification}/read',        [NotificationController::class, 'markAsRead']);
    Route::post('/notifications/send',                      [NotificationController::class, 'send']);

    // ============================================================
    // POSITIONS MODULE (Authenticated write)
    // ============================================================
    Route::post('/positions', [PositionController::class, 'store']); // Any logged-in user can suggest

    Route::middleware('role:admin')->group(function () {
        Route::put('/positions/{position}',                 [PositionController::class, 'update']);
        Route::patch('/positions/{position}/toggle-status', [PositionController::class, 'toggleStatus']);
        Route::delete('/positions/{position}',              [PositionController::class, 'destroy']);
    });
});

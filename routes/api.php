<?php

use App\Http\Controllers\Api\ApplicationController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\EmployerController;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\PackageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - Manpower Hiring App
|--------------------------------------------------------------------------
*/

// ========================
// AUTH MODULE (Public)
// ========================
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/send-otp', [AuthController::class, 'sendOtp']);
    Route::post('/resend-otp', [AuthController::class, 'resendOtp']);
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);

    // Requires auth
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/change-password', [AuthController::class, 'changePassword']);
        Route::post('/change-mobile', [AuthController::class, 'changeMobile']);
        Route::post('/refresh-token', [AuthController::class, 'refreshToken']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/profile', [AuthController::class, 'myProfile']);
    });
});

// ========================
// PUBLIC ROUTES
// ========================
Route::get('/packages', [PackageController::class, 'index']);
Route::post('/payments/webhook', [PackageController::class, 'webhook']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);
Route::get('/categories/{category}/jobs', [CategoryController::class, 'jobs']);

Route::get('/positions', [\App\Http\Controllers\Api\PositionController::class, 'index']);

// ========================
// AUTHENTICATED ROUTES
// ========================
Route::middleware('auth:sanctum')->group(function () {

    // ========================
    // EMPLOYEE MODULE
    // ========================
    Route::prefix('employee')->middleware('role:employee')->group(function () {
        Route::get('/dashboard', [EmployeeController::class, 'dashboard']);
        Route::get('/profile', [EmployeeController::class, 'getProfile']);
        Route::put('/profile', [EmployeeController::class, 'updateProfile']);
        Route::post('/upload-resume', [EmployeeController::class, 'uploadResume']);
        Route::post('/build-resume', [EmployeeController::class, 'buildResume']);
        Route::post('/verify-id', [EmployeeController::class, 'verifyId']);
        Route::get('/applications', [EmployeeController::class, 'myApplications']);
        Route::put('/settings', [EmployeeController::class, 'updateSettings']);
    });

    // ========================
    // EMPLOYER MODULE
    // ========================
    Route::prefix('employer')->middleware('role:employer')->group(function () {
        Route::get('/dashboard', [EmployerController::class, 'dashboard']);
        Route::get('/profile', [EmployerController::class, 'getProfile']);
        Route::put('/profile', [EmployerController::class, 'updateProfile']);
        Route::post('/upload-document', [EmployerController::class, 'uploadDocument']);
        Route::get('/jobs', [EmployerController::class, 'myJobs']);
        Route::get('/subscription', [EmployerController::class, 'subscription']);
        Route::put('/settings', [EmployerController::class, 'updateSettings']);
    });

    // ========================
    // JOB MODULE
    // ========================
    Route::get('/jobs/matching', [JobController::class, 'matching']);
    Route::get('/jobs/search', [JobController::class, 'search']);
    Route::get('/jobs/{job}', [JobController::class, 'show']);
    Route::post('/jobs/{job}/apply', [JobController::class, 'apply']);

    // Employer only jobs management
    Route::middleware('role:employer')->group(function () {
        Route::post('/jobs', [JobController::class, 'store']);
        Route::put('/jobs/{job}', [JobController::class, 'update']);
        Route::put('/jobs/{job}/status', [JobController::class, 'updateStatus']);
        Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
        Route::get('/jobs/{job}/applicants', [JobController::class, 'applicants']);
        Route::get('/jobs/{job}/analytics', [JobController::class, 'analytics']);
    });

    // ========================
    // APPLICATION MODULE
    // ========================
    Route::get('/applications', [ApplicationController::class, 'index']); // Generic list (fallback)
    Route::get('/applications/{application}/status', [ApplicationController::class, 'status']);
    Route::put('/applications/{application}/status', [ApplicationController::class, 'updateStatus']); // Employer only

    // ========================
    // PAYMENT MODULE
    // ========================
    Route::post('/payments/checkout', [PackageController::class, 'checkout']);

    // ========================
    // CANDIDATE SEARCH (Employer)
    // ========================
    Route::get('/candidates/search', [PackageController::class, 'searchCandidates'])->middleware('role:employer');

    // ========================
    // NOTIFICATION MODULE
    // ========================
    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::get('/notifications/unread-count', [NotificationController::class, 'unreadCount']);
    Route::put('/notifications/read-all', [NotificationController::class, 'markAllAsRead']);
    Route::put('/notifications/{notification}/read', [NotificationController::class, 'markAsRead']);
    Route::post('/notifications/send', [NotificationController::class, 'send']);
});

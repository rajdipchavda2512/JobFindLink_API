<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Employee\EmployeeAuthController;
use App\Http\Controllers\Employee\ProfileSetupController;

/*
|--------------------------------------------------------------------------
| ROOT
|--------------------------------------------------------------------------
*/
Route::get('/', [EmployeeAuthController::class, 'home'])->name('login');


/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    // Auth Routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    Route::middleware(['auth'])->group(function () {

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->middleware('permission:dashboard.view')
            ->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

        /*
        |--------------------------------------------------------------------------
        | Admin Permission
        |--------------------------------------------------------------------------
        */

        // Users
        Route::get('/users', [UserController::class, 'index'])->middleware('permission:users.index')->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->middleware('permission:users.create')->name('users.create');
        Route::post('/users/store', [UserController::class, 'store'])->middleware('permission:users.create')->name('users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('permission:users.edit')->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->middleware('permission:users.edit')->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware('permission:users.delete')->name('users.destroy');
        Route::post('/users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->middleware('permission:users.status')->name('users.toggle-status');

        // Jobs
        Route::get('/jobs', [JobController::class, 'index'])->middleware('permission:jobs.index')->name('jobs.index');
        Route::get('/jobs/{job}', [JobController::class, 'show'])->middleware('permission:jobs.view')->name('jobs.show');
        Route::put('/jobs/{job}/approve', [JobController::class, 'approve'])->middleware('permission:jobs.approve')->name('jobs.approve');
        Route::put('/jobs/{job}/reject', [JobController::class, 'reject'])->middleware('permission:jobs.reject')->name('jobs.reject');

        // Applications
        Route::get('/applications', [ApplicationController::class, 'index'])->middleware('permission:applications.index')->name('applications.index');

        // Packages
        Route::get('/packages', [PackageController::class, 'index'])->middleware('permission:packages.index')->name('packages.index');
        Route::get('/packages/create', [PackageController::class, 'create'])->middleware('permission:packages.create')->name('packages.create');
        Route::post('/packages', [PackageController::class, 'store'])->middleware('permission:packages.create')->name('packages.store');
        Route::get('/packages/{package}/edit', [PackageController::class, 'edit'])->middleware('permission:packages.edit')->name('packages.edit');
        Route::put('/packages/{package}/update', [PackageController::class, 'update'])->middleware('permission:packages.edit')->name('packages.update');
        Route::delete('/packages/{package}', [PackageController::class, 'destroy'])->middleware('permission:packages.delete')->name('packages.destroy');
        Route::post('/packages/{package}/toggle-status', [PackageController::class, 'toggleStatus'])->middleware('permission:packages.status')->name('packages.toggle-status');

        // Positions
        Route::get('/positions', [PositionController::class, 'index'])->middleware('permission:positions.index')->name('positions.index');
        Route::get('/positions/create', [PositionController::class, 'create'])->middleware('permission:positions.create')->name('positions.create');
        Route::post('/positions', [PositionController::class, 'store'])->middleware('permission:positions.create')->name('positions.store');
        Route::get('/positions/{position}/edit', [PositionController::class, 'edit'])->middleware('permission:positions.edit')->name('positions.edit');
        Route::put('/positions/{position}', [PositionController::class, 'update'])->middleware('permission:positions.edit')->name('positions.update');
        Route::delete('/positions/{position}', [PositionController::class, 'destroy'])->middleware('permission:positions.delete')->name('positions.destroy');

        // Categories
        Route::get('/categories', [CategoryController::class, 'index'])->middleware('permission:categories.index')->name('categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->middleware('permission:categories.create')->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->middleware('permission:categories.create')->name('categories.store');
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->middleware('permission:categories.edit')->name('categories.edit');
        Route::put('/categories/{category}', [CategoryController::class, 'update'])->middleware('permission:categories.edit')->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->middleware('permission:categories.delete')->name('categories.destroy');

        // Payments
        Route::get('/payments', [PaymentController::class, 'index'])->middleware('permission:payments.index')->name('payments.index');

        // Roles
        Route::get('/roles', [RoleController::class, 'index'])->middleware('permission:roles.index')->name('roles.index');
        Route::get('/roles/create', [RoleController::class, 'create'])->middleware('permission:roles.create')->name('roles.create');
        Route::post('/roles/store', [RoleController::class, 'store'])->middleware('permission:roles.create')->name('roles.store');
        Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->middleware('permission:roles.edit')->name('roles.edit');
        Route::put('/roles/{role}', [RoleController::class, 'update'])->middleware('permission:roles.edit')->name('roles.update');
        Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->middleware('permission:roles.delete')->name('roles.destroy');

    });

});


/*
|--------------------------------------------------------------------------
| EMPLOYEE
|--------------------------------------------------------------------------
*/
Route::get('/', [EmployeeAuthController::class, 'home'])->name('home');

Route::prefix('employee')->name('employee.')->group(function () {

    Route::get('/login', [EmployeeAuthController::class, 'MobileForm'])->name('login');
    Route::post('/send-otp', [EmployeeAuthController::class, 'sendOtp'])->name('send.otp');

    Route::get('/verify', [EmployeeAuthController::class, 'showOtpForm'])->name('verify.form');
    Route::post('/verify', [EmployeeAuthController::class, 'verifyOtp'])->name('verify.otp');

    Route::post('/resend-otp', [EmployeeAuthController::class, 'resendOtp'])->name('resend.otp');

    Route::get('/profile', [EmployeeAuthController::class, 'profile'])->middleware('auth')->name('profile');
    Route::post('/profile', [EmployeeAuthController::class, 'saveProfile'])->middleware('auth')->name('profile.save');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return "Employee Dashboard";
    })->middleware('auth')->name('dashboard');

});


Route::prefix('employee')->name('employee.')->middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [EmployeeAuthController::class, 'index'])->name('index');

    // Personal Details
    Route::get('/personal', [EmployeeAuthController::class, 'personalDetails'])->name('personal');
    Route::post('/personal', [EmployeeAuthController::class, 'updatePersonalDetails'])->name('personal.update');

    // Education
    Route::get('/educations', [EmployeeAuthController::class, 'educationList'])->name('educations');
    Route::get('/education/create', [EmployeeAuthController::class, 'educationForm'])->name('education.create');
    Route::get('/education/{id}/edit', [EmployeeAuthController::class, 'educationForm'])->name('education.edit');
    Route::post('/education/{id?}', [EmployeeAuthController::class, 'saveEducation'])->name('education.save');
    Route::delete('/education/{id}', [EmployeeAuthController::class, 'deleteEducation'])->name('education.delete');

    // Experience
    Route::get('/experiences', [EmployeeAuthController::class, 'experienceList'])->name('experiences');
    Route::get('/experience/create', [EmployeeAuthController::class, 'experienceForm'])->name('experience.create');
    Route::get('/experience/{id}/edit', [EmployeeAuthController::class, 'experienceForm'])->name('experience.edit');
    Route::post('/experience/{id?}', [EmployeeAuthController::class, 'saveExperience'])->name('experience.save');
    Route::delete('/experience/{id}', [EmployeeAuthController::class, 'deleteExperience'])->name('experience.delete');

    // Languages
    Route::get('/languages', [EmployeeAuthController::class, 'languageList'])->name('languages');
    Route::post('/language', [EmployeeAuthController::class, 'addLanguage'])->name('language.add');
    Route::delete('/language/{id}', [EmployeeAuthController::class, 'removeLanguage'])->name('language.remove');
    Route::post('/employee/remove-resume', [EmployeeAuthController::class, 'removeResume'])->name('remove.resume');

    Route::post('/logout', [EmployeeAuthController::class, 'logout'])->name('logout');

});
// routes/web.php


Route::middleware(['auth'])->prefix('employee')->name('employee.')->group(function () {
    // Employee profile completion routes
    Route::get('/complete-profile', [EmployeeAuthController::class, 'showCompleteProfile'])->name('complete.profile');
    Route::post('/upload-resume', [EmployeeAuthController::class, 'uploadResume'])->name('upload.resume');
    Route::post('/step1', [EmployeeAuthController::class, 'saveStep1'])->name('step1');
    Route::post('/step2', [EmployeeAuthController::class, 'saveStep2'])->name('step2');
    Route::post('/step3', [EmployeeAuthController::class, 'saveStep3'])->name('step3');
    Route::post('/step4', [EmployeeAuthController::class, 'saveStep4'])->name('step4');
    Route::post('/step5', [EmployeeAuthController::class, 'saveStep5'])->name('step5');
    Route::post('/step6', [EmployeeAuthController::class, 'saveStep6'])->name('step6');
    Route::post('/step7', [EmployeeAuthController::class, 'saveStep7'])->name('step7');
    Route::post('/skip-step', [EmployeeAuthController::class, 'skipStep'])->name('skip.step');
        Route::get('/dashboard', [EmployeeAuthController::class, 'index'])->name('dashboard');

});
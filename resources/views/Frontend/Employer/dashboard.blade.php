{{-- resources/views/frontend/employer/dashboard.blade.php --}}
@extends('frontend.employer.layouts')

@section('title', 'Employer Dashboard - JobFindLink')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-yellow-50 py-8 px-4">
    <div class="max-w-7xl mx-auto">
        <!-- Welcome Header -->
        <div class="bg-white rounded-2xl shadow-xl p-6 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Welcome back, {{ $employer->full_name ?? 'Employer' }}!</h1>
                    <p class="text-gray-500 mt-1">Here's what's happening with your jobs today.</p>
                </div>
                <div class="bg-gradient-to-r from-blue-600 to-yellow-500 rounded-lg p-3">
                    <i class="fas fa-building text-white text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Total Jobs</p>
                        <p class="text-3xl font-bold text-gray-800">0</p>
                    </div>
                    <div class="bg-blue-100 rounded-full p-3">
                        <i class="fas fa-briefcase text-blue-600 text-xl"></i>
                    </div>
                </div>
                <a href="#" class="text-blue-600 text-sm mt-4 inline-block">View all jobs →</a>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Total Applications</p>
                        <p class="text-3xl font-bold text-gray-800">0</p>
                    </div>
                    <div class="bg-green-100 rounded-full p-3">
                        <i class="fas fa-users text-green-600 text-xl"></i>
                    </div>
                </div>
                <a href="#" class="text-blue-600 text-sm mt-4 inline-block">View applications →</a>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Shortlisted</p>
                        <p class="text-3xl font-bold text-gray-800">0</p>
                    </div>
                    <div class="bg-yellow-100 rounded-full p-3">
                        <i class="fas fa-star text-yellow-600 text-xl"></i>
                    </div>
                </div>
                <a href="#" class="text-blue-600 text-sm mt-4 inline-block">View shortlisted →</a>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">Hired</p>
                        <p class="text-3xl font-bold text-gray-800">0</p>
                    </div>
                    <div class="bg-purple-100 rounded-full p-3">
                        <i class="fas fa-user-check text-purple-600 text-xl"></i>
                    </div>
                </div>
                <a href="#" class="text-blue-600 text-sm mt-4 inline-block">View hired →</a>
            </div>
        </div>

        <!-- Company Profile Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8">
            <div class="bg-gradient-to-r from-blue-600 to-yellow-500 px-6 py-4">
                <h2 class="text-xl font-bold text-white">Company Profile</h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <p class="text-gray-500 text-sm">Company Name</p>
                        <p class="text-gray-800 font-semibold">{{ $profile->company_name ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Work Email</p>
                        <p class="text-gray-800 font-semibold">{{ $profile->work_email ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Industry Type</p>
                        <p class="text-gray-800 font-semibold">{{ $profile->industry_type ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Company Size</p>
                        <p class="text-gray-800 font-semibold">{{ $profile->company_size ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Website</p>
                        <p class="text-gray-800 font-semibold">
                            @if($profile->company_website)
                                <a href="{{ $profile->company_website }}" target="_blank" class="text-blue-600 hover:underline">{{ $profile->company_website }}</a>
                            @else
                                Not provided
                            @endif
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm">Your Designation</p>
                        <p class="text-gray-800 font-semibold">{{ $profile->employer_designation ?? 'Not provided' }}</p>
                    </div>
                </div>
                <div class="mt-4">
                    <p class="text-gray-500 text-sm">Company Description</p>
                    <p class="text-gray-700 mt-1">{{ $profile->company_description ?? 'No description provided.' }}</p>
                </div>
                <div class="mt-6">
                    <a href="{{ route('employer.complete.profile') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        <i class="fas fa-edit"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-plus-circle text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Post a New Job</h3>
                <p class="text-gray-500 text-sm mb-4">Create a new job posting and find the best talent</p>
                <a href="#" class="inline-block px-4 py-2 bg-gradient-to-r from-blue-600 to-yellow-500 text-white rounded-lg hover:shadow-lg transition">
                    Post Job
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-search text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Search Candidates</h3>
                <p class="text-gray-500 text-sm mb-4">Find the perfect candidates for your open positions</p>
                <a href="#" class="inline-block px-4 py-2 bg-gradient-to-r from-blue-600 to-yellow-500 text-white rounded-lg hover:shadow-lg transition">
                    Search Now
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chart-line text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">View Reports</h3>
                <p class="text-gray-500 text-sm mb-4">Get insights about your job postings and applications</p>
                <a href="#" class="inline-block px-4 py-2 bg-gradient-to-r from-blue-600 to-yellow-500 text-white rounded-lg hover:shadow-lg transition">
                    View Reports
                </a>
            </div>
        </div>
    </div>
</div>
@endsection     
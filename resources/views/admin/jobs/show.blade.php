@extends('admin.layouts.app')

@section('title', 'Job Details')
@section('page_title', 'Job Details')
@section('page_subtitle', $job->title)

@section('content')
<div class="row g-5 g-xl-8">
    <div class="col-xl-8">
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">{{ $job->title }}</span>
                    <span class="text-muted fw-bold fs-7">{{ $job->company_name }} • Posted {{ $job->created_at->format('M d, Y') }}</span>
                </h3>
                <div class="card-toolbar">
                    @if($job->status === 'pending')
                    <div class="d-flex">
                        <form action="{{ route('admin.jobs.approve', $job) }}" method="POST" class="me-2">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-success">Approve</button>
                        </form>
                        <form action="{{ route('admin.jobs.reject', $job) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                        </form>
                    </div>
                    @else
                        @php
                            $badges = [
                                'active' => 'success',
                                'pending' => 'warning',
                                'rejected' => 'danger',
                                'closed' => 'secondary'
                            ];
                            $badgeColor = $badges[$job->status] ?? 'secondary';
                        @endphp
                        <span class="badge badge-light-{{ $badgeColor }} fs-6 px-4 py-2">{{ ucfirst($job->status) }}</span>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-7">
                    <div class="col-md-6 mb-5">
                        <span class="text-muted d-block fw-bold mb-1">Job Type</span>
                        <span class="text-dark fw-bolder fs-5">{{ ucfirst($job->job_type) }}</span>
                    </div>
                    <div class="col-md-6 mb-5">
                        <span class="text-muted d-block fw-bold mb-1">Work Setup</span>
                        <span class="text-dark fw-bolder fs-5">{{ strtoupper($job->work_location_type) }} ({{ $job->location }})</span>
                    </div>
                    <div class="col-md-6 mb-5">
                        <span class="text-muted d-block fw-bold mb-1">Salary</span>
                        <span class="text-dark fw-bolder fs-5">
                            @if($job->pay_type == 'fixed')
                                ₹{{ number_format($job->salary_min) }}
                            @else
                                ₹{{ number_format($job->salary_min) }} - ₹{{ number_format($job->salary_max) }}
                            @endif
                        </span>
                    </div>
                    <div class="col-md-6 mb-5">
                        <span class="text-muted d-block fw-bold mb-1">Experience Required</span>
                        <span class="text-dark fw-bolder fs-5">{{ $job->experience_required ?? 'Not specified' }}</span>
                    </div>
                </div>

                <div class="mb-7">
                    <span class="text-muted d-block fw-bold mb-2">Description</span>
                    <div class="text-dark fs-6 bg-light p-4 rounded">{{ $job->description ?? 'No description provided.' }}</div>
                </div>

                <div class="mb-7">
                    <span class="text-muted d-block fw-bold mb-2">Required Skills</span>
                    <div class="d-flex flex-wrap">
                        @if($job->skills_required && is_array($job->skills_required))
                            @foreach($job->skills_required as $skill)
                                <span class="badge badge-light-primary me-2 mb-2">{{ $skill }}</span>
                            @endforeach
                        @else
                            <span class="text-muted">Not specified</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Employer Info</span>
                </h3>
            </div>
            <div class="card-body">
                @if($job->employer)
                <div class="d-flex flex-column">
                    <span class="text-dark fw-bolder fs-5 mb-1">{{ $job->employer->full_name }}</span>
                    <span class="text-muted fw-bold d-block mb-4">{{ $job->employer->email ?? 'No email' }}</span>
                    <span class="text-muted fw-bold d-block mb-4"><i class="bi bi-phone"></i> {{ $job->employer->mobile }}</span>
                    <a href="{{ route('admin.users.edit', $job->employer) }}" class="btn btn-sm btn-light-primary">View Employer</a>
                </div>
                @else
                <span class="text-muted">Employer details not found.</span>
                @endif
            </div>
        </div>

        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Application Stats</span>
                </h3>
            </div>
            <div class="card-body">
                <div class="d-flex flex-stack bg-light-primary p-4 rounded mb-3">
                    <span class="fw-bold text-primary">Total Applications</span>
                    <span class="fw-bolder fs-3 text-primary">{{ $job->applications->count() }}</span>
                </div>
                <div class="d-flex flex-stack bg-light p-4 rounded mb-3">
                    <span class="fw-bold text-dark">Views</span>
                    <span class="fw-bolder fs-3 text-dark">{{ $job->views_count }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

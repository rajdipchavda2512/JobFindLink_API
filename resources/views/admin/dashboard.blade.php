@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Overview')

@section('content')
<div class="row g-5 g-xl-8">
    <div class="col-xl-3">
        <div class="card bg-primary hoverable card-xl-stretch mb-xl-8">
            <div class="card-body">
                <i class="bi bi-people text-white fs-2x ms-n1"></i>
                <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ number_format($stats['total_employees']) }}</div>
                <div class="fw-bold text-white">Candidates</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card bg-info hoverable card-xl-stretch mb-xl-8">
            <div class="card-body">
                <i class="bi bi-buildings text-white fs-2x ms-n1"></i>
                <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ number_format($stats['total_employers']) }}</div>
                <div class="fw-bold text-white">Employers</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card bg-success hoverable card-xl-stretch mb-xl-8">
            <div class="card-body">
                <i class="bi bi-briefcase text-white fs-2x ms-n1"></i>
                <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ number_format($stats['active_jobs']) }}</div>
                <div class="fw-bold text-white">Active Jobs</div>
            </div>
        </div>
    </div>
    <div class="col-xl-3">
        <div class="card bg-warning hoverable card-xl-stretch mb-5 mb-xl-8">
            <div class="card-body">
                <i class="bi bi-currency-rupee text-white fs-2x ms-n1"></i>
                <div class="text-white fw-bolder fs-2 mb-2 mt-5">{{ number_format($stats['revenue_total_inr'], 2) }}</div>
                <div class="fw-bold text-white">Total Revenue</div>
            </div>
        </div>
    </div>
</div>

<div class="row g-5 g-xl-8">
    <div class="col-xl-6">
        <div class="card card-xl-stretch mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Recent Jobs</span>
                </h3>
                <div class="card-toolbar">
                    <a href="{{ route('admin.jobs.index') }}" class="btn btn-sm btn-light-primary">View All</a>
                </div>
            </div>
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <thead>
                            <tr class="fw-bolder text-muted">
                                <th class="min-w-150px">Job</th>
                                <th class="min-w-140px">Company</th>
                                <th class="min-w-120px">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stats['recent_jobs'] as $job)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="{{ route('admin.jobs.show', $job) }}" class="text-dark fw-bolder text-hover-primary fs-6">{{ $job->title }}</a>
                                            <span class="text-muted fw-bold text-muted d-block fs-7">{{ ucfirst($job->job_type) }} • {{ $job->location }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-dark fw-bolder d-block fs-6">{{ $job->company_name }}</span>
                                </td>
                                <td>
                                    @if($job->status === 'active')
                                        <span class="badge badge-light-success">Active</span>
                                    @elseif($job->status === 'pending')
                                        <span class="badge badge-light-warning">Pending</span>
                                    @elseif($job->status === 'rejected')
                                        <span class="badge badge-light-danger">Rejected</span>
                                    @else
                                        <span class="badge badge-light-secondary">Closed</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @if($stats['recent_jobs']->isEmpty())
                            <tr>
                                <td colspan="3" class="text-center text-muted py-5">No recent jobs found.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-6">
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Recent Applications</span>
                </h3>
                <div class="card-toolbar">
                    <a href="{{ route('admin.applications.index') }}" class="btn btn-sm btn-light-primary">View All</a>
                </div>
            </div>
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <thead>
                            <tr class="fw-bolder text-muted">
                                <th class="min-w-150px">Applicant</th>
                                <th class="min-w-140px">Job</th>
                                <th class="min-w-120px">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stats['recent_applications'] as $app)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <span class="text-dark fw-bolder d-block fs-6">{{ $app->employee->full_name }}</span>
                                            <span class="text-muted fw-bold d-block fs-7">{{ $app->applied_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.jobs.show', $app->job) }}" class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ Str::limit($app->job->title, 20) }}</a>
                                    <span class="text-muted fw-bold d-block fs-7">{{ mb_strimwidth($app->job->company_name, 0, 20, '...') }}</span>
                                </td>
                                <td>
                                    @php
                                        $badges = [
                                            'applied' => 'primary',
                                            'under_review' => 'warning',
                                            'shortlisted' => 'info',
                                            'hired' => 'success',
                                            'rejected' => 'danger'
                                        ];
                                        $badgeColor = $badges[$app->status] ?? 'secondary';
                                    @endphp
                                    <span class="badge badge-light-{{ $badgeColor }}">{{ str_replace('_', ' ', ucfirst($app->status)) }}</span>
                                </td>
                            </tr>
                            @endforeach
                            @if($stats['recent_applications']->isEmpty())
                            <tr>
                                <td colspan="3" class="text-center text-muted py-5">No recent applications found.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

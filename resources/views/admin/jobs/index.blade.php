@extends('admin.layouts.app')

@section('title', 'Jobs Management')
@section('page_title', 'Jobs')

@section('content')
<div class="card mb-5 mb-xl-8">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Job Postings</span>
        </h3>
        <div class="card-toolbar">
            <form action="{{ route('admin.jobs.index') }}" method="GET" class="d-flex align-items-center position-relative my-1">
                <select name="status" class="form-select form-select-sm form-select-solid w-150px me-3" onchange="this.form.submit()">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending Approval</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
                <div class="position-relative">
                    <span class="svg-icon svg-icon-1 position-absolute ms-4 mt-2">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-sm form-control-solid w-250px ps-14" placeholder="Search title, company..." />
                </div>
            </form>
        </div>
    </div>

    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <thead>
                    <tr class="fw-bolder text-muted">
                        <th class="w-10px">#</th>
                        <th class="min-w-200px">Job Detail</th>
                        <th class="min-w-150px">Company</th>
                        <th class="min-w-100px">Location Details</th>
                        <th class="min-w-100px">Status</th>
                        <th class="min-w-100px text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $job)
                    <tr>
                        <td>{{ $job->id }}</td>
                        <td>
                            <div class="d-flex flex-column">
                                <a href="{{ route('admin.jobs.show', $job) }}" class="text-dark fw-bolder text-hover-primary fs-6">{{ $job->title }}</a>
                                <span class="text-muted fw-bold d-block fs-7">{{ ucfirst($job->job_type) }} • 
                                @if($job->pay_type == 'fixed')
                                    ₹{{ number_format($job->salary_min) }}
                                @else
                                    ₹{{ number_format($job->salary_min) }} - ₹{{ number_format($job->salary_max) }}
                                @endif
                                </span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <span class="text-dark fw-bolder fs-6">{{ $job->company_name }}</span>
                                <span class="text-muted fw-bold d-block fs-7">By: {{ $job->employer->full_name ?? 'Unknown' }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <span class="text-dark fw-bolder fs-6">{{ $job->location }}</span>
                                <span class="badge badge-light-info fw-bold fs-8 mt-1">{{ strtoupper($job->work_location_type) }}</span>
                            </div>
                        </td>
                        <td>
                            @if($job->status === 'active')
                                <span class="badge badge-light-success fs-7 fw-bolder">Active</span>
                            @elseif($job->status === 'pending')
                                <span class="badge badge-light-warning fs-7 fw-bolder">Pending</span>
                            @elseif($job->status === 'rejected')
                                <span class="badge badge-light-danger fs-7 fw-bolder">Rejected</span>
                            @else
                                <span class="badge badge-light-secondary fs-7 fw-bolder">Closed</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.jobs.show', $job) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <i class="bi bi-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    @if($jobs->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center text-muted py-10">No jobs found.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-end mt-5">
            {{ $jobs->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection

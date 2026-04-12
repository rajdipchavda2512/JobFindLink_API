@extends('admin.layouts.app')

@section('title', 'Applications Management')
@section('page_title', 'Applications')

@section('content')
<div class="card mb-5 mb-xl-8">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Job Applications</span>
        </h3>
        <div class="card-toolbar">
            <form action="{{ route('admin.applications.index') }}" method="GET" class="d-flex align-items-center position-relative my-1">
                <select name="status" class="form-select form-select-sm form-select-solid w-150px me-3" onchange="this.form.submit()">
                    <option value="">All Statuses</option>
                    <option value="applied" {{ request('status') == 'applied' ? 'selected' : '' }}>Applied</option>
                    <option value="under_review" {{ request('status') == 'under_review' ? 'selected' : '' }}>Under Review</option>
                    <option value="shortlisted" {{ request('status') == 'shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                    <option value="hired" {{ request('status') == 'hired' ? 'selected' : '' }}>Hired</option>
                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
                <div class="position-relative">
                    <span class="svg-icon svg-icon-1 position-absolute ms-4 mt-2">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-sm form-control-solid w-250px ps-14" placeholder="Search applicant, job..." />
                </div>
            </form>
        </div>
    </div>

    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <thead>
                    <tr class="fw-bolder text-muted">
                        <th class="w-10px">ID</th>
                        <th class="min-w-150px">Applicant</th>
                        <th class="min-w-200px">Job Detail</th>
                        <th class="min-w-120px">Date</th>
                        <th class="min-w-100px">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $app)
                    <tr>
                        <td>{{ $app->id }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="d-flex justify-content-start flex-column">
                                    <span class="text-dark fw-bolder fs-6">{{ $app->employee->full_name }}</span>
                                    <span class="text-muted fw-bold d-block fs-7">{{ $app->employee->mobile }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <a href="{{ route('admin.jobs.show', $app->job) }}" class="text-dark fw-bolder text-hover-primary fs-6">{{ $app->job->title }}</a>
                                <span class="text-muted fw-bold d-block fs-7">{{ $app->job->company_name }}</span>
                            </div>
                        </td>
                        <td>
                            <span class="text-dark fw-bolder d-block fs-6">{{ $app->applied_at->format('M d, Y') }}</span>
                            <span class="text-muted fw-bold d-block fs-7">{{ $app->applied_at->format('h:i A') }}</span>
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
                            <span class="badge badge-light-{{ $badgeColor }} fs-7 fw-bolder">{{ str_replace('_', ' ', ucfirst($app->status)) }}</span>
                        </td>
                    </tr>
                    @endforeach
                    @if($applications->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-muted py-10">No applications found.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-end mt-5">
            {{ $applications->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection

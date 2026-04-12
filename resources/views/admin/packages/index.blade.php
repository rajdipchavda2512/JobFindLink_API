@extends('admin.layouts.app')

@section('title', 'Packages Management')
@section('page_title', 'Packages')

@section('content')
<div class="card mb-5 mb-xl-8">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Subscription Packages</span>
        </h3>
        <div class="card-toolbar">
            <a href="{{ route('admin.packages.create') }}" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg"></i> Create Package
            </a>
        </div>
    </div>

    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <thead>
                    <tr class="fw-bolder text-muted">
                        <th class="w-10px">ID</th>
                        <th class="min-w-150px">Plan Details</th>
                        <th class="min-w-120px">Pricing</th>
                        <th class="min-w-140px">Features</th>
                        <th class="min-w-100px">Status</th>
                        <th class="min-w-100px text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packages as $package)
                    <tr>
                        <td>{{ $package->id }}</td>
                        <td>
                            <div class="d-flex flex-column">
                                <span class="text-dark fw-bolder fs-6">{{ $package->name }}</span>
                                <span class="text-muted fw-bold d-block fs-7">Validity: {{ $package->validity_days }} days</span>
                            </div>
                        </td>
                        <td>
                            <span class="text-success fw-bolder d-block fs-6">₹{{ number_format($package->price, 2) }}</span>
                        </td>
                        <td>
                            <div class="d-flex flex-column gap-1">
                                <span class="badge badge-light-primary fw-bold" style="width: fit-content">{{ $package->job_posts_allowed }} Job Posts</span>
                                <span class="badge badge-light-info fw-bold" style="width: fit-content">{{ $package->candidate_db_access }} DB Access</span>
                                @if($package->featured_listing)
                                <span class="badge badge-light-warning fw-bold" style="width: fit-content"><i class="bi bi-star-fill text-warning me-1"></i> Featured Job</span>
                                @endif
                            </div>
                        </td>
                        <td>
                            @if($package->is_active)
                                <span class="badge badge-light-success fs-7 fw-bold">Active</span>
                            @else
                                <span class="badge badge-light-danger fs-7 fw-bold">Inactive</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.packages.edit', $package) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.packages.destroy', $package) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm" onclick="return confirm('Are you sure you want to deactivate this package?')" {{ !$package->is_active ? 'disabled' : '' }}>
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($packages->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center text-muted py-10">No packages created yet.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-end mt-5">
            {{ $packages->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection

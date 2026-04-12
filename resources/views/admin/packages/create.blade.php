@extends('admin.layouts.app')

@section('title', 'Create Package')
@section('page_title', 'Create Package')
@section('page_subtitle', 'Add new subscription plan')

@section('content')
<div class="row">
    <div class="col-xl-8">
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Package Details</h3>
                </div>
            </div>
            <form action="{{ route('admin.packages.store') }}" method="POST" class="form">
                @csrf
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Plan Name</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="name" class="form-control form-control-lg form-control-solid" value="{{ old('name') }}" placeholder="e.g. Basic, Premium" required />
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Price (INR)</label>
                        <div class="col-lg-8 fv-row">
                            <input type="number" step="0.01" name="price" class="form-control form-control-lg form-control-solid" value="{{ old('price') }}" required />
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Validity (Days)</label>
                        <div class="col-lg-8 fv-row">
                            <input type="number" name="validity_days" class="form-control form-control-lg form-control-solid" value="{{ old('validity_days') }}" required />
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Job Posts Allowed</label>
                        <div class="col-lg-8 fv-row">
                            <input type="number" name="job_posts_allowed" class="form-control form-control-lg form-control-solid" value="{{ old('job_posts_allowed') }}" placeholder="Enter 9999 for unlimited" required />
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Candidate DB Access Limit</label>
                        <div class="col-lg-8 fv-row">
                            <input type="number" name="candidate_db_access" class="form-control form-control-lg form-control-solid" value="{{ old('candidate_db_access') }}" placeholder="Enter 9999 for unlimited" required />
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">Features</label>
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="form-check form-check-solid form-switch fv-row">
                                <input class="form-check-input w-45px h-30px" type="checkbox" name="featured_listing" value="1" {{ old('featured_listing') ? 'checked' : '' }} />
                                <label class="form-check-label fw-bold fs-6">Includes Featured Job Listing</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{ route('admin.packages.index') }}" class="btn btn-light btn-active-light-primary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Package</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

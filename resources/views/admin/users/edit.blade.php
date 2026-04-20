@extends('admin.layouts.app')

@section('title', 'Edit User')
@section('page_title', 'Edit User')
@section('page_subtitle', $user->full_name)

@section('content')
<div class="row">
    <div class="col-xl-8">
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">User Details</h3>
                </div>
            </div>
            <form action="{{ route('admin.users.update', $user) }}" method="POST" class="form">
                @csrf
                @method('PUT')
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">Mobile (Read-only)</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" class="form-control form-control-lg form-control-solid" value="{{ $user->mobile }}" readonly />
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="full_name" class="form-control form-control-lg form-control-solid" value="{{ old('full_name', $user->full_name) }}" />
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Email Address</label>
                        <div class="col-lg-8 fv-row">
                            <input type="email" name="email" class="form-control form-control-lg form-control-solid" value="{{ old('email', $user->email) }}" />
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Role</label>
                        <div class="col-lg-8 fv-row">
                            <select name="role" class="form-select form-select-solid form-select-lg">
                                <option value="employee" {{ (old('role', $user->role) == 'employee') ? 'selected' : '' }}>Employee</option>
                                <option value="employer" {{ (old('role', $user->role) == 'employer') ? 'selected' : '' }}>Employer</option>
                                <option value="admin" {{ (old('role', $user->role) == 'admin') ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                    </div>
                    <div id="employer_fields" style="display: {{ old('role', $user->role) === 'employer' ? 'block' : 'none' }};" class="mt-10 mb-10 border-top pt-10">
                        <h4 class="mb-5 text-gray-800">Employer Details</h4>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Company Name</label>
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="company_name" class="form-control form-control-lg form-control-solid" value="{{ old('company_name', optional($user->employerProfile)->company_name) }}" />
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Industry Type</label>
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="industry_type" class="form-control form-control-lg form-control-solid" value="{{ old('industry_type', optional($user->employerProfile)->industry_type) }}" placeholder="e.g. IT, Manufacturing" />
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Company Size</label>
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="company_size" class="form-control form-control-lg form-control-solid" value="{{ old('company_size', optional($user->employerProfile)->company_size) }}" placeholder="e.g. 10-50 employees" />
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Website URL</label>
                            <div class="col-lg-8 fv-row">
                                <input type="url" name="company_website" class="form-control form-control-lg form-control-solid" value="{{ old('company_website', optional($user->employerProfile)->company_website) }}" />
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Designation</label>
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="employer_designation" class="form-control form-control-lg form-control-solid" value="{{ old('employer_designation', optional($user->employerProfile)->employer_designation) }}" placeholder="HR Manager, CEO" />
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Company Description</label>
                            <div class="col-lg-8 fv-row">
                                <textarea name="company_description" class="form-control form-control-lg form-control-solid" rows="3">{{ old('company_description', optional($user->employerProfile)->company_description) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div id="employee_fields" style="display: {{ old('role', $user->role) === 'employee' ? 'block' : 'none' }};" class="mt-10 mb-10 border-top pt-10">
                        <h4 class="mb-5 text-gray-800">Employee KYC & ID Verification</h4>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Aadhaar Number</label>
                            <div class="col-lg-8 fv-row">
                                <input type="text" class="form-control form-control-lg form-control-solid" value="{{ optional($user->employeeProfile)->aadhaar_number_masked ?: 'Not Provided' }}" readonly />
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">ID Documents</label>
                            <div class="col-lg-8 fv-row d-flex align-items-center">
                                @if(optional($user->employeeProfile)->id_document_url)
                                    <a href="{{ url(optional($user->employeeProfile)->id_document_url) }}" target="_blank" class="btn btn-sm btn-light-primary me-3">View Front</a>
                                @else
                                    <span class="badge badge-light-danger me-3">No Front ID</span>
                                @endif
                                
                                @if(optional($user->employeeProfile)->id_document_back_url)
                                    <a href="{{ url(optional($user->employeeProfile)->id_document_back_url) }}" target="_blank" class="btn btn-sm btn-light-primary">View Back</a>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">KYC Status</label>
                            <div class="col-lg-8 d-flex align-items-center">
                                <div class="form-check form-check-solid form-switch fv-row">
                                    <input class="form-check-input w-45px h-30px" type="checkbox" name="id_verified" value="1" {{ old('id_verified', optional($user->employeeProfile)->id_verified) ? 'checked' : '' }} />
                                    <label class="form-check-label fw-bold fs-6">ID Verified (Govt Check)</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6 border-top pt-8 mt-8 border-dashed">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">Account Status</label>
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="form-check form-check-solid form-switch fv-row me-10">
                                <input class="form-check-input w-45px h-30px" type="checkbox" name="is_active" value="1" {{ old('is_active', $user->is_active) ? 'checked' : '' }} />
                                <label class="form-check-label fw-bold fs-6">Active</label>
                            </div>
                            <div class="form-check form-check-solid form-switch fv-row">
                                <input class="form-check-input w-45px h-30px" type="checkbox" name="is_verified" value="1" {{ old('is_verified', $user->is_verified) ? 'checked' : '' }} />
                                <label class="form-check-label fw-bold fs-6">OTP Verified</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-light btn-active-light-primary me-2">Discard</a>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const roleSelect = document.querySelector('select[name="role"]');
        const employerFields = document.getElementById('employer_fields');
        const employeeFields = document.getElementById('employee_fields');

        roleSelect.addEventListener('change', function() {
            if (this.value === 'employer') {
                employerFields.style.display = 'block';
                if(employeeFields) employeeFields.style.display = 'none';
            } else if (this.value === 'employee') {
                employerFields.style.display = 'none';
                if(employeeFields) employeeFields.style.display = 'block';
            } else {
                employerFields.style.display = 'none';
                if(employeeFields) employeeFields.style.display = 'none';
            }
        });
    });
</script>
@endsection

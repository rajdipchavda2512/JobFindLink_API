@extends('admin.layouts.app')

@section('title', 'My Profile')
@section('page_title', 'My Profile')
@section('page_subtitle', 'Account Settings')

@section('content')
<div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">Profile Details</h3>
        </div>
    </div>
    <div id="kt_account_settings_profile_details" class="collapse show">
        <form action="{{ route('admin.profile.update') }}" method="POST" class="form">
            @csrf
            @method('PUT')
            <div class="card-body border-top p-9">
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="full_name" class="form-control form-control-lg form-control-solid" value="{{ old('full_name', $user->full_name) }}" />
                        @error('full_name') <span class="text-danger mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Email Address</label>
                    <div class="col-lg-8 fv-row">
                        <input type="email" name="email" class="form-control form-control-lg form-control-solid" value="{{ old('email', $user->email) }}" />
                        @error('email') <span class="text-danger mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Mobile Number</label>
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="mobile" class="form-control form-control-lg form-control-solid" value="{{ old('mobile', $user->mobile) }}" />
                        @error('mobile') <span class="text-danger mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="border-top pt-8 mt-8 border-dashed"></div>
                <h4 class="mb-8">Change Password</h4>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">New Password</label>
                    <div class="col-lg-8 fv-row">
                        <input type="password" name="password" class="form-control form-control-lg form-control-solid" placeholder="Leave blank to ignore" />
                        @error('password') <span class="text-danger mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">Confirm Password</label>
                    <div class="col-lg-8 fv-row">
                        <input type="password" name="password_confirmation" class="form-control form-control-lg form-control-solid" placeholder="Confirm new password" />
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection

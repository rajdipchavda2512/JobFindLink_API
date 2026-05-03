@extends('admin.layouts.app')

@section('title', 'Create User')
@section('page_title', 'Create User')
@section('page_subtitle', 'Add New User')

@section('content')
<div class="row">
    <div class="col-xl-8">
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">User Details</h3>
                </div>
            </div>

            <form action="{{ route('admin.users.store') }}" method="POST" class="form">
                @csrf

                <div class="card-body border-top p-9">

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">
                            Full Name
                        </label>
                        <div class="col-lg-8 fv-row">
                            <input type="text"
                                   name="name"
                                   class="form-control form-control-lg form-control-solid"
                                   value="{{ old('name') }}"
                                   placeholder="Enter full name" />
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">
                            Email Address
                        </label>
                        <div class="col-lg-8 fv-row">
                            <input type="email"
                                   name="email"
                                   class="form-control form-control-lg form-control-solid"
                                   value="{{ old('email') }}"
                                   placeholder="Enter email address" />
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">
                            Mobile Number
                        </label>
                        <div class="col-lg-8 fv-row">
                            <input type="text"
                                   name="mobile"
                                   class="form-control form-control-lg form-control-solid"
                                   value="{{ old('mobile') }}"
                                   placeholder="Enter mobile number" />
                        </div>
                    </div>

                   

                   <div class="row mb-6">
    <label class="col-lg-4 col-form-label required fw-bold fs-6">
        Password
    </label>

    <div class="col-lg-8 fv-row position-relative">
        <input type="password"
               name="password"
               id="password"
               class="form-control form-control-lg form-control-solid pe-15"
               placeholder="Enter password" />

        <button type="button"
                class="btn btn-sm btn-icon position-absolute top-50 end-0 translate-middle-y me-4"
                onclick="togglePassword('password','password_icon')">
            <i class="bi bi-eye fs-3" id="password_icon"></i>
        </button>
    </div>
</div>

<div class="row mb-6">
    <label class="col-lg-4 col-form-label required fw-bold fs-6">
        Confirm Password
    </label>

    <div class="col-lg-8 fv-row position-relative">
        <input type="password"
               name="password_confirmation"
               id="confirm_password"
               class="form-control form-control-lg form-control-solid pe-15"
               placeholder="Confirm password" />

        <button type="button"
                class="btn btn-sm btn-icon position-absolute top-50 end-0 translate-middle-y me-4"
                onclick="togglePassword('confirm_password','confirm_password_icon')">
            <i class="bi bi-eye fs-3" id="confirm_password_icon"></i>
        </button>
    </div>
</div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">
                            Role
                        </label>
                        <div class="col-lg-8 fv-row">
                            <select name="role" class="form-select form-select-solid form-select-lg">
                                <option value="">Select Role</option>

                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            Account Status
                        </label>

                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="form-check form-check-solid form-switch fv-row me-10">
                                <input class="form-check-input w-45px h-30px"
                                       type="checkbox"
                                       name="is_active"
                                       value="1"
                                       checked />

                                <label class="form-check-label fw-bold fs-6">
                                    Active
                                </label>
                            </div>

                            <div class="form-check form-check-solid form-switch fv-row">
                                <input class="form-check-input w-45px h-30px"
                                       type="checkbox"
                                       name="is_verified"
                                       value="1" />

                                <label class="form-check-label fw-bold fs-6">
                                    Verified
                                </label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{ route('admin.users.index') }}"
                       class="btn btn-light btn-active-light-primary me-2">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Create User
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
function togglePassword(inputId, iconId)
{
    let input = document.getElementById(inputId);
    let icon  = document.getElementById(iconId);

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
    }
}
</script>
@endsection
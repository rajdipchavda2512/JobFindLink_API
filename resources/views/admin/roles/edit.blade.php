@extends('admin.layouts.app')

@section('title', 'Edit Role')
@section('page_title', 'Edit Role')
@section('page_subtitle', $role->name)

@section('content')
<div class="row">
    <div class="col-xl-8">
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Role Details</h3>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.roles.update', $role) }}" class="form">
                @csrf
                @method('PUT')

                <div class="card-body border-top p-9">

                    {{-- Role Name --}}
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">
                            Role Name
                        </label>

                        <div class="col-lg-8 fv-row">
                            <input type="text"
                                   name="name"
                                   class="form-control form-control-lg form-control-solid"
                                   placeholder="e.g. Admin"
                                   value="{{ old('name', $role->name) }}"
                                   required />

                            @error('name')
                                <span class="text-danger mt-1 fs-8">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Permissions --}}
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">
                            Permissions
                        </label>

                        <div class="col-lg-8">
                            <div class="row">

                                @foreach($permissions as $permission)
                                    <div class="col-md-6 mb-3">
                                        <label class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input me-3"
                                                   type="checkbox"
                                                   name="permissions[]"
                                                   value="{{ $permission->name }}"
                                                   {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>

                                            <span class="form-check-label fw-bold text-gray-700 fs-6">
                                                {{ $permission->name }}
                                            </span>
                                        </label>
                                    </div>
                                @endforeach

                            </div>

                            @error('permissions')
                                <span class="text-danger mt-1 fs-8">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{ route('admin.roles.index') }}"
                       class="btn btn-light btn-active-light-primary me-2">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Update Role
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
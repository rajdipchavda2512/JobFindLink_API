@extends('admin.layouts.app')

@section('title', 'Users Management')
@section('page_title', 'Users')

@section('content')
<div class="card mb-5 mb-xl-8">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Users List</span>
        </h3>
        <div class="card-toolbar">
            <form action="{{ route('admin.users.index') }}" method="GET" class="d-flex align-items-center position-relative my-1">
                <select name="role" class="form-select form-select-sm form-select-solid w-150px me-3" onchange="this.form.submit()">
                    <option value="">All Roles</option>
                    <option value="employee" {{ request('role') == 'employee' ? 'selected' : '' }}>Employee</option>
                    <option value="employer" {{ request('role') == 'employer' ? 'selected' : '' }}>Employer</option>
                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                <div class="position-relative">
                    <span class="svg-icon svg-icon-1 position-absolute ms-4 mt-2">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-sm form-control-solid w-250px ps-14" placeholder="Search users" />
                </div>
            </form>
        </div>
    </div>

    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <thead>
                    <tr class="fw-bolder text-muted">
                        <th class="w-25px">ID</th>
                        <th class="min-w-200px">Name</th>
                        <th class="min-w-150px">Contact</th>
                        <th class="min-w-100px">Role</th>
                        <th class="min-w-100px">Status</th>
                        <th class="min-w-100px text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-45px me-5">
                                    <span class="symbol-label bg-light-primary text-primary fw-bolder fs-4">{{ substr($user->full_name ?? 'U', 0, 1) }}</span>
                                </div>
                                <div class="d-flex justify-content-start flex-column">
                                    <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $user->full_name }}</span>
                                    <span class="text-muted fw-bold d-block fs-7">Joined {{ $user->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <span class="text-dark fw-bolder fs-6">{{ $user->mobile }}</span>
                                <span class="text-muted fw-bold d-block fs-7">{{ $user->email ?? 'No email' }}</span>
                            </div>
                        </td>
                        <td>
                            @if($user->role === 'admin')
                                <span class="badge badge-light-danger fs-7 fw-bolder">Admin</span>
                            @elseif($user->role === 'employer')
                                <span class="badge badge-light-info fs-7 fw-bolder">Employer</span>
                            @else
                                <span class="badge badge-light-primary fs-7 fw-bolder">Employee</span>
                            @endif
                        </td>
                        <td>
                            @if($user->is_active)
                                <span class="badge badge-light-success fs-7 fw-bold mb-1">Active</span>
                            @else
                                <span class="badge badge-light-danger fs-7 fw-bold mb-1">Inactive</span>
                            @endif
                            
                            @if($user->is_verified)
                                <br><span class="badge badge-light-primary fs-8 fw-bold">Verified</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <i class="bi bi-pencil"></i>
                            </a>
                            @if(Auth::id() !== $user->id)
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @if($users->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center text-muted py-10">No users found.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-end mt-5">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection

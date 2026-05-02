@extends('admin.layouts.app')

@section('title', 'Roles Management')
@section('page_title', 'Roles Management')

@section('content')
<div class="card mb-5 mb-xl-8">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Roles</span>
        </h3>

        <div class="card-toolbar">
            <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg"></i> Create Role
            </a>
        </div>
    </div>

    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <thead>
                    <tr class="fw-bolder text-muted">
                        <th class="w-50px">ID</th>
                        <th class="min-w-200px">Role Name</th>
                        <th class="min-w-300px">Permissions</th>
                        <th class="min-w-100px text-end">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>

                        <td>
                            <div class="d-flex flex-column">
                                <span class="text-dark fw-bolder fs-6">
                                    {{ $role->name }}
                                </span>
                            </div>
                        </td>

                        <td>
                            @forelse($role->permissions as $perm)
                                <span class="badge badge-light-primary me-1 mb-1">
                                    {{ $perm->name }}
                                </span>
                            @empty
                                <span class="text-muted">No Permissions</span>
                            @endforelse
                        </td>

                        <td class="text-end">
                            <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this role?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    @if($roles->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center text-muted py-10">
                            No roles found.
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-5">
            {{ $roles->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
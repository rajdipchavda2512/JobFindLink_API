@extends('admin.layouts.app')

@section('title', 'Positions Management')
@section('page_title', 'Positions')

@section('content')
<div class="card mb-5 mb-xl-8">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Positions</span>
        </h3>
        <div class="card-toolbar">
            <form action="{{ route('admin.positions.index') }}" method="GET" class="d-flex align-items-center position-relative my-1 me-3">
                <span class="svg-icon svg-icon-1 position-absolute ms-4 mt-2"><i class="bi bi-search"></i></span>
                <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-sm form-control-solid w-250px ps-14" placeholder="Search positions..." />
            </form>
            <a href="{{ route('admin.positions.create') }}" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg"></i> Create Position
            </a>
        </div>
    </div>

    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <thead>
                    <tr class="fw-bolder text-muted">
                        <th class="w-10px">ID</th>
                        <th class="min-w-200px">Name</th>
                        <th class="min-w-200px">Description</th>
                        <th class="min-w-100px">Status</th>
                        <th class="min-w-100px text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($positions as $position)
                    <tr>
                        <td>{{ $position->id }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="d-flex justify-content-start flex-column">
                                    <span class="text-dark fw-bolder fs-6">{{ $position->name }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-muted fw-bold d-block fs-7">{{ Str::limit($position->description, 50) }}</span>
                        </td>
                        <td>
                            @if($position->is_active)
                                <span class="badge badge-light-success fs-7 fw-bold">Active</span>
                            @else
                                <span class="badge badge-light-danger fs-7 fw-bold">Inactive</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.positions.edit', $position) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.positions.destroy', $position) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm" onclick="return confirm('Are you sure you want to delete this position?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($positions->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-muted py-10">No positions found.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-end mt-5">
            {{ $positions->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.app')

@section('title', 'Categories Management')
@section('page_title', 'Job Categories')

@section('content')
<div class="card mb-5 mb-xl-8">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Categories</span>
        </h3>
        <div class="card-toolbar">
            <form action="{{ route('admin.categories.index') }}" method="GET" class="d-flex align-items-center position-relative my-1 me-3">
                <span class="svg-icon svg-icon-1 position-absolute ms-4 mt-2"><i class="bi bi-search"></i></span>
                <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-sm form-control-solid w-250px ps-14" placeholder="Search categories..." />
            </form>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-lg"></i> Create Category
            </a>
        </div>
    </div>

    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <thead>
                    <tr class="fw-bolder text-muted">
                        <th class="w-10px">ID</th>
                        <th class="min-w-200px">Name / Slug</th>
                        <th class="min-w-100px">Jobs Count</th>
                        <th class="min-w-100px">Status</th>
                        <th class="min-w-100px text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                @if($category->icon)
                                <div class="symbol symbol-40px bg-light-primary text-primary text-center align-items-center d-flex justify-content-center me-3 rounded">
                                    <i class="{{ $category->icon }} fs-3 text-primary"></i>
                                </div>
                                @endif
                                <div class="d-flex justify-content-start flex-column">
                                    <span class="text-dark fw-bolder fs-6">{{ $category->name }}</span>
                                    <span class="text-muted fw-bold d-block fs-7">/{{ $category->slug }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-light-primary fw-bolder px-4 py-2">{{ $category->jobs_count }} Jobs</span>
                        </td>
                        <td>
                            @if($category->is_active)
                                <span class="badge badge-light-success fs-7 fw-bold">Active</span>
                            @else
                                <span class="badge badge-light-danger fs-7 fw-bold">Inactive</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($categories->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-muted py-10">No categories found.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-end mt-5">
            {{ $categories->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.app')

@section('title', $category->exists ? 'Edit Category' : 'Create Category')
@section('page_title', $category->exists ? 'Edit Category' : 'Create Category')
@section('page_subtitle', $category->name)

@section('content')
<div class="row">
    <div class="col-xl-8">
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Category Details</h3>
                </div>
            </div>
            
            @php
                $route = $category->exists ? route('admin.categories.update', $category) : route('admin.categories.store');
            @endphp
            
            <form action="{{ $route }}" method="POST" class="form">
                @csrf
                @if($category->exists)
                    @method('PUT')
                @endif
                
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Category Name</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="name" class="form-control form-control-lg form-control-solid" value="{{ old('name', $category->name) }}" placeholder="e.g. IT & Software" required />
                            @error('name') <span class="text-danger mt-1 fs-8">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">Bootstrap Icon Class</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="icon" class="form-control form-control-lg form-control-solid" value="{{ old('icon', $category->icon) }}" placeholder="e.g. bi-laptop" />
                            <div class="form-text">Reference <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons</a> for class names.</div>
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">Status</label>
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="form-check form-check-solid form-switch fv-row">
                                <input class="form-check-input w-45px h-30px" type="checkbox" name="is_active" value="1" {{ old('is_active', $category->is_active ?? true) ? 'checked' : '' }} />
                                <label class="form-check-label fw-bold fs-6">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-light btn-active-light-primary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">{{ $category->exists ? 'Update Category' : 'Create Category' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.app')

@section('title', $position->exists ? 'Edit Position' : 'Create Position')
@section('page_title', $position->exists ? 'Edit Position' : 'Create Position')
@section('page_subtitle', $position->name)

@section('content')
<div class="row">
    <div class="col-xl-8">
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Position Details</h3>
                </div>
            </div>
            
            @php
                $route = $position->exists ? route('admin.positions.update', $position) : route('admin.positions.store');
            @endphp
            
            <form action="{{ $route }}" method="POST" class="form">
                @csrf
                @if($position->exists)
                    @method('PUT')
                @endif
                
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Position Name</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="name" class="form-control form-control-lg form-control-solid" value="{{ old('name', $position->name) }}" placeholder="e.g. Software Engineer" required />
                            @error('name') <span class="text-danger mt-1 fs-8">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">Description</label>
                        <div class="col-lg-8 fv-row">
                            <textarea name="description" class="form-control form-control-lg form-control-solid" rows="3" placeholder="Optional description">{{ old('description', $position->description) }}</textarea>
                            @error('description') <span class="text-danger mt-1 fs-8">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-bold fs-6">Status</label>
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="form-check form-check-solid form-switch fv-row">
                                <input class="form-check-input w-45px h-30px" type="checkbox" name="is_active" value="1" {{ old('is_active', $position->is_active ?? true) ? 'checked' : '' }} />
                                <label class="form-check-label fw-bold fs-6">Active</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a href="{{ route('admin.positions.index') }}" class="btn btn-light btn-active-light-primary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">{{ $position->exists ? 'Update Position' : 'Create Position' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

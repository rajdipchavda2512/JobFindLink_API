{{-- resources/views/employee/experience-form.blade.php --}}
@extends('Frontend.employee.layouts')

@section('title', isset($experience) ? 'Edit Experience' : 'Add Experience')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('employee.experiences') }}" class="text-yellow-600 hover:text-yellow-700">
            <i class="fas fa-arrow-left mr-1"></i> Back to Experience
        </a>
    </div>
    
    <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8">
        <div class="text-center mb-6">
            <div class="w-20 h-20 bg-gradient-to-r from-blue-800 to-blue-900 rounded-2xl flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-briefcase text-yellow-400 text-4xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">{{ isset($experience) ? 'Edit Experience' : 'Add Work Experience' }}</h2>
            <p class="text-gray-500 text-sm mt-1">{{ isset($experience) ? 'Update your work experience details' : 'Add your professional work experience' }}</p>
        </div>
        
        <form action="{{ route('employee.experience.save', isset($experience) ? $experience->id : null) }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Company Name *</label>
                <input type="text" name="company_name" value="{{ old('company_name', isset($experience) ? $experience->company_name : '') }}" required
                       class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl focus:border-yellow-500 focus:ring-0 transition">
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Industry/Sector</label>
                <input type="text" name="industry_sector" value="{{ old('industry_sector', isset($experience) ? $experience->industry_sector : '') }}"
                       class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl focus:border-yellow-500 focus:ring-0 transition"
                       placeholder="e.g., IT, Banking, Healthcare">
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Employment Type *</label>
                <select name="employment_type" required class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl focus:border-yellow-500 focus:ring-0 transition">
                    <option value="">Select Type</option>
                    <option value="full-time" {{ isset($experience) && $experience->employment_type == 'full-time' ? 'selected' : '' }}>Full Time</option>
                    <option value="part-time" {{ isset($experience) && $experience->employment_type == 'part-time' ? 'selected' : '' }}>Part Time</option>
                    <option value="contract" {{ isset($experience) && $experience->employment_type == 'contract' ? 'selected' : '' }}>Contract</option>
                    <option value="internship" {{ isset($experience) && $experience->employment_type == 'internship' ? 'selected' : '' }}>Internship</option>
                </select>
            </div>
            
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Start Date *</label>
                    <input type="date" name="start_date" value="{{ old('start_date', isset($experience) ? $experience->start_date : '') }}" required
                           class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl focus:border-yellow-500 focus:ring-0 transition">
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">End Date</label>
                    <input type="date" name="end_date" value="{{ old('end_date', isset($experience) ? $experience->end_date : '') }}"
                           class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl focus:border-yellow-500 focus:ring-0 transition"
                           id="end_date">
                </div>
            </div>
            
            <div>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="currently_working" value="1" {{ isset($experience) && $experience->currently_working ? 'checked' : '' }}
                           class="rounded border-gray-300 text-yellow-500 focus:ring-yellow-500" id="currently_working">
                    <span class="text-sm text-gray-700">I currently work here</span>
                </label>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Notice Period</label>
                <input type="text" name="notice_period" value="{{ old('notice_period', isset($experience) ? $experience->notice_period : '') }}"
                       class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl focus:border-yellow-500 focus:ring-0 transition"
                       placeholder="e.g., 15 days, 1 month, 2 months">
            </div>
            
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('employee.experiences') }}" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">Cancel</a>
                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-yellow-500 to-yellow-600 text-white rounded-lg font-semibold hover:shadow-lg transition">
                    {{ isset($experience) ? 'Update' : 'Save' }} Experience
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    const currentlyWorking = document.getElementById('currently_working');
    const endDateField = document.getElementById('end_date');
    
    currentlyWorking.addEventListener('change', function() {
        if (this.checked) {
            endDateField.value = '';
            endDateField.disabled = true;
        } else {
            endDateField.disabled = false;
        }
    });
    
    if (currentlyWorking.checked) {
        endDateField.disabled = true;
    }
</script>
@endpush
@endsection
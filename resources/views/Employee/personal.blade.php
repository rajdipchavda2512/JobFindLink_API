@extends('Employee.layouts')

@section('title', 'Personal Details')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('employee.dashboard') }}" class="text-yellow-600 hover:text-yellow-700">
            <i class="fas fa-arrow-left mr-1"></i> Back to Profile
        </a>
    </div>
    
    <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8">
        <div class="text-center mb-6">
            <div class="w-20 h-20 gradient-bg rounded-2xl flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-user-circle text-white text-4xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Personal Details</h2>
            <p class="text-gray-500 text-sm mt-1">Update your personal and professional information</p>
        </div>
        
        <form action="{{ route('employee.personal.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Full Name -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Full Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="full_name" value="{{ old('full_name', $employee->full_name ?? '') }}" 
                           class="w-full px-4 py-2 border-2 rounded-xl transition @error('full_name') border-red-500 bg-red-50 @else border-gray-200 focus:border-yellow-500 @enderror"
                           required>
                    @error('full_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', $employee->email ?? '') }}" 
                           class="w-full px-4 py-2 border-2 rounded-xl transition @error('email') border-red-500 bg-red-50 @else border-gray-200 focus:border-yellow-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Gender -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Gender</label>
                    <select name="gender" class="w-full px-4 py-2 border-2 rounded-xl transition @error('gender') border-red-500 bg-red-50 @else border-gray-200 focus:border-yellow-500 @enderror">
                        <option value="">Select Gender</option>
                        <option value="male" {{ old('gender', $employee->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $employee->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender', $employee->gender ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('gender')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Birthdate -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Birthdate</label>
                    <input type="date" name="birthdate" value="{{ old('birthdate', $employee->birthdate ?? '') }}" 
                           class="w-full px-4 py-2 border-2 rounded-xl transition @error('birthdate') border-red-500 bg-red-50 @else border-gray-200 focus:border-yellow-500 @enderror">
                    @error('birthdate')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Dynamic Location Selection: City → Area -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Location</label>
                    
                    <!-- City Dropdown -->
                    <div class="mb-3">
                        <select id="city_select" class="w-full px-4 py-2 border-2 border-gray-200 rounded-xl focus:border-yellow-500 focus:ring-0 transition">
                            <option value="">Select City</option>
                            @php
                                $uniqueCities = $locations->unique('city')->sortBy('city');
                            @endphp
                            @foreach($uniqueCities as $cityLocation)
                                <option value="{{ $cityLocation->city }}" 
                                    {{ isset($selected_city) && $selected_city == $cityLocation->city ? 'selected' : '' }}>
                                    {{ $cityLocation->city }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Area Dropdown (Final Location) -->
                    <div>
                        <select name="location_id" id="area_select" class="w-full px-4 py-2 border-2 rounded-xl transition @error('location_id') border-red-500 bg-red-50 @else border-gray-200 focus:border-yellow-500 @enderror" disabled>
                            <option value="">Select Area First</option>
                        </select>
                        @error('location_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <!-- Job Title -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Current Job Title</label>
                    <select name="job_title_id" class="w-full px-4 py-2 border-2 rounded-xl transition @error('job_title_id') border-red-500 bg-red-50 @else border-gray-200 focus:border-yellow-500 @enderror">
                        <option value="">Select Job Title</option>
                        @foreach($jobTitles ?? [] as $jobTitle)
                        <option value="{{ $jobTitle->id }}" {{ old('job_title_id', $employee->job_title_id ?? '') == $jobTitle->id ? 'selected' : '' }}>
                            {{ $jobTitle->name ?? '' }}
                        </option>
                        @endforeach
                    </select>
                    @error('job_title_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Total Experience -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Total Experience (Years)</label>
                    <input type="number" name="total_experience" step="0.5" min="0" max="50" 
                           value="{{ old('total_experience', $employee->total_experience ?? '') }}" 
                           class="w-full px-4 py-2 border-2 rounded-xl transition @error('total_experience') border-red-500 bg-red-50 @else border-gray-200 focus:border-yellow-500 @enderror">
                    @error('total_experience')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Current Salary -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Current Salary (₹)</label>
                    <input type="number" name="current_salary" step="0.01" min="0" 
                           value="{{ old('current_salary', $employee->current_salary ?? '') }}" 
                           class="w-full px-4 py-2 border-2 rounded-xl transition @error('current_salary') border-red-500 bg-red-50 @else border-gray-200 focus:border-yellow-500 @enderror">
                    @error('current_salary')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Expected Salary -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Expected Salary (₹)</label>
                    <input type="number" name="expected_salary" step="0.01" min="0" 
                           value="{{ old('expected_salary', $employee->expected_salary ?? '') }}" 
                           class="w-full px-4 py-2 border-2 rounded-xl transition @error('expected_salary') border-red-500 bg-red-50 @else border-gray-200 focus:border-yellow-500 @enderror">
                    @error('expected_salary')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Skills -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Skills (comma separated)</label>
                    <textarea name="skills" rows="3" 
                              class="w-full px-4 py-2 border-2 rounded-xl transition @error('skills') border-red-500 bg-red-50 @else border-gray-200 focus:border-yellow-500 @enderror">{{ old('skills', $employee->skills ?? '') }}</textarea>
                    @error('skills')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-500 mt-1">Example: PHP, Laravel, JavaScript, React, MySQL</p>
                </div>
                
                <!-- About Me -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">About Me / Professional Summary</label>
                    <textarea name="description" rows="5" 
                              class="w-full px-4 py-2 border-2 rounded-xl transition @error('description') border-red-500 bg-red-50 @else border-gray-200 focus:border-yellow-500 @enderror">{{ old('description', $employee->description ?? '') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Resume -->
                <div class="md:col-span-2" id="resume">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Resume/CV</label>
                    <input type="file" name="resume" accept=".pdf,.doc,.docx" 
                           class="w-full px-4 py-2 border-2 rounded-xl transition @error('resume') border-red-500 bg-red-50 @else border-gray-200 focus:border-yellow-500 @enderror">
                    @error('resume')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-500 mt-1">Accepted formats: PDF, DOC, DOCX (Max 2MB)</p>
                    @if(isset($employee) && $employee->resume)
                    <p class="text-xs text-green-600 mt-2">
                        Current file: <a href="{{ asset('storage/'.$employee->resume) }}" target="_blank" class="underline">View Resume</a>
                    </p>
                    @endif
                </div>
            </div>
            
            <div class="flex justify-end gap-3 pt-4 border-t">
                <a href="{{ route('employee.dashboard') }}" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">Cancel</a>
                <button type="submit" class="px-6 py-2 btn-yellow text-white rounded-lg font-semibold hover:shadow-lg transition">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Get references to dropdowns
    const citySelect = document.getElementById('city_select');
    const areaSelect = document.getElementById('area_select');
    
    // Store all locations data from server
    const locationsData = @json($locations);
    let selectedAreaId = "{{ old('location_id', $employee->location_id ?? '') }}";
    
    // Function to load areas based on selected city
    function loadAreas(city) {
        if (city) {
            // Disable area select and show loading
            areaSelect.disabled = true;
            areaSelect.innerHTML = '<option value="">Loading areas...</option>';
            
            // Filter areas by selected city
            const filteredAreas = locationsData.filter(location => location.city === city);
            
            if (filteredAreas.length === 0) {
                areaSelect.innerHTML = '<option value="">No areas found</option>';
                areaSelect.disabled = false;
            } else {
                let options = '<option value="">Select Area</option>';
                filteredAreas.forEach(area => {
                    const selected = (area.id == selectedAreaId) ? 'selected' : '';
                    options += `<option value="${area.id}" ${selected}>${area.area}</option>`;
                });
                areaSelect.innerHTML = options;
                areaSelect.disabled = false;
            }
        } else {
            areaSelect.disabled = true;
            areaSelect.innerHTML = '<option value="">Select Area First</option>';
        }
    }
    
    // Handle city selection change
    citySelect.addEventListener('change', function() {
        const selectedCity = this.value;
        loadAreas(selectedCity);
    });
    
    // Handle area selection change (optional - can add validation)
    areaSelect.addEventListener('change', function() {
        if (this.value) {
            // Optional: You can add any additional logic here
            console.log('Selected area ID:', this.value);
        }
    });
    
    // Initial load - if city is already selected, load its areas
    if (citySelect.value) {
        loadAreas(citySelect.value);
    }
</script>
@endpush
@endsection
@extends('Frontend.employee.layouts')

@section('title', 'Personal Details')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-yellow-50 to-orange-50 py-8 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('employee.dashboard') }}" class="inline-flex items-center text-yellow-600 hover:text-yellow-700 transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Profile
            </a>
        </div>

        <!-- Profile Completion Progress -->
        @if(isset($profileProgress))
        <div class="mb-8">
            <div class="bg-white rounded-full h-2 overflow-hidden shadow-inner">
                <div class="bg-gradient-to-r from-yellow-500 to-orange-600 h-2 transition-all duration-500" style="width: {{ $profileProgress }}%"></div>
            </div>
            <p class="text-sm text-gray-600 mt-2 text-center">Profile Completion: {{ $profileProgress }}%</p>
        </div>
        @endif

        <!-- Alert Messages -->
        <div id="alertMessage" class="hidden mb-4 p-4 rounded-lg"></div>

        <!-- Form Container -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white">Personal Information</h2>
                        <p class="text-yellow-100 mt-1">Update your personal and professional details</p>
                    </div>
                </div>
            </div>
            
            <form id="personalInfoForm" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf
                
                <div class="space-y-6">
                    <!-- Profile Photo Section -->
                    <div class="flex items-center justify-center mb-6">
                        <div class="relative">
                            <div id="profilePhotoPreview" class="w-32 h-32 rounded-full bg-gray-200 overflow-hidden flex items-center justify-center border-4 border-yellow-500 shadow-lg">
                                @if(isset($employee) && $employee->profile_photo)
                                    <img src="{{ Storage::url($employee->profile_photo) }}" class="w-full h-full object-cover" id="profilePhotoImg">
                                @else
                                    <img id="profilePhotoImg" src="" alt="Profile Preview" class="hidden w-full h-full object-cover">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                @endif
                            </div>
                            <label for="profile_photo" class="absolute bottom-0 right-0 bg-yellow-500 rounded-full p-2 cursor-pointer hover:bg-yellow-600 transition shadow-lg">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </label>
                            <input type="file" name="profile_photo" id="profile_photo" accept="image/*" class="hidden">
                        </div>
                    </div>
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Full Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="full_name" id="full_name" value="{{ old('full_name', $employee->full_name ?? '') }}" 
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-yellow-500 transition @error('full_name') border-red-500 bg-red-50 @enderror"
                                   placeholder="Enter your full name" required>
                            <p class="text-red-500 text-xs mt-1 hidden" id="full_name_error"></p>
                            @error('full_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $employee->email ?? Auth::user()->email ?? '') }}" 
                                   pattern="^[a-zA-Z0-9._%+-]+@(gmail|yahoo|hotmail|outlook)\.(com|in)$"
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-yellow-500 transition @error('email') border-red-500 bg-red-50 @enderror"
                                   placeholder="your.email@gmail.com">
                            <p class="text-red-500 text-xs mt-1 hidden" id="email_error"></p>
                            <p class="text-xs text-gray-500 mt-1">Supported: Gmail, Yahoo, Hotmail, Outlook</p>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Mobile Number -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Mobile Number</label>
                            <input type="tel" name="mobile" id="mobile" value="{{ old('mobile', $employee->mobile ?? '') }}" 
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-yellow-500 transition @error('mobile') border-red-500 bg-red-50 @enderror"
                                   placeholder="9876543210" 
                                   maxlength="10"
                                   onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                   oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)">
                            <p class="text-red-500 text-xs mt-1 hidden" id="mobile_error"></p>
                            <p class="text-xs text-gray-500 mt-1">10-digit mobile number</p>
                            @error('mobile')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Gender -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Gender <span class="text-red-500">*</span></label>
                            <div class="flex gap-6">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="gender" value="male" class="mr-2" {{ old('gender', $employee->gender ?? '') == 'male' ? 'checked' : '' }}> 
                                    <span>Male</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="gender" value="female" class="mr-2" {{ old('gender', $employee->gender ?? '') == 'female' ? 'checked' : '' }}> 
                                    <span>Female</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="gender" value="other" class="mr-2" {{ old('gender', $employee->gender ?? '') == 'other' ? 'checked' : '' }}> 
                                    <span>Other</span>
                                </label>
                            </div>
                            <p class="text-red-500 text-xs mt-1 hidden" id="gender_error"></p>
                            @error('gender')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Age -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Age <span class="text-red-500">*</span></label>
                            <input type="text" name="age" id="age" value="{{ old('age', $employee->age ?? '') }}" 
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-yellow-500 transition @error('age') border-red-500 bg-red-50 @enderror"
                                   placeholder="25" 
                                   onkeypress="return event.charCode >= 48 && event.charCode <= 57" 
                                   oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 3)" 
                                   maxlength="3" required>
                            <p class="text-red-500 text-xs mt-1 hidden" id="age_error"></p>
                            @error('age')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Location (City/Area) -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                            
                            @if(isset($locations) && count($locations) > 0)
                                <!-- City Dropdown -->
                                <div class="mb-3">
                                    <select id="city_select" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-yellow-500 transition">
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
                                    <select name="location_id" id="area_select" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-yellow-500 transition @error('location_id') border-red-500 bg-red-50 @enderror" disabled>
                                        <option value="">Select Area First</option>
                                    </select>
                                    <p class="text-red-500 text-xs mt-1 hidden" id="location_id_error"></p>
                                    <p class="text-xs text-gray-500 mt-1">Select your city first, then choose your area</p>
                                </div>
                            @else
                                <input type="text" name="location" id="location" value="{{ old('location', $employee->location ?? '') }}" 
                                       class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-yellow-500 transition"
                                       placeholder="Enter your location">
                                <p class="text-red-500 text-xs mt-1 hidden" id="location_error"></p>
                            @endif
                            @error('location_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Form Actions -->
                    <div class="flex justify-end gap-3 pt-6 border-t">
                        <a href="{{ route('employee.dashboard') }}" class="px-6 py-2 border-2 border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium">
                            Cancel
                        </a>
                        <button type="submit" class="save-personal-info px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg font-semibold hover:shadow-lg transition flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Get references to dropdowns (if locations exist)
    @if(isset($locations) && count($locations) > 0)
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
    if (citySelect) {
        citySelect.addEventListener('change', function() {
            const selectedCity = this.value;
            loadAreas(selectedCity);
        });
    }
    
    // Initial load - if city is already selected, load its areas
    if (citySelect && citySelect.value) {
        loadAreas(citySelect.value);
    }
    @endif
    
    // Show alert message function
    function showAlert(message, type = 'error') {
        let alertDiv = $('#alertMessage');
        alertDiv.removeClass('hidden bg-green-100 text-green-700 bg-red-100 text-red-700');
        
        if (type === 'success') {
            alertDiv.addClass('bg-green-100 text-green-700');
        } else {
            alertDiv.addClass('bg-red-100 text-red-700');
        }
        
        alertDiv.html('<div class="flex items-center">' +
            '<svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">' +
            (type === 'success' ? 
                '<path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>' :
                '<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>'
            ) +
            '</svg>' + message + '</div>');
        alertDiv.removeClass('hidden');
        
        setTimeout(() => {
            alertDiv.addClass('hidden');
        }, 5000);
    }

    function showFieldError(field, message) {
        $(`#${field}_error`).removeClass('hidden').text(message);
        $(`#${field}`).addClass('border-red-500');
    }

    function clearErrors() {
        $('[id$="_error"]').addClass('hidden').text('');
        $('input, select').removeClass('border-red-500');
    }

    // Profile photo preview
    $('#profile_photo').change(function() {
        let file = this.files[0];
        if (file) {
            if (file.size > 2 * 1024 * 1024) {
                showAlert('Profile photo must be less than 2MB');
                $(this).val('');
                return;
            }
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#profilePhotoImg').attr('src', e.target.result).removeClass('hidden');
                $('#profilePhotoPreview svg').addClass('hidden');
            };
            reader.readAsDataURL(file);
        }
    });

    // Email validation
    $('#email').on('input', function() {
        const emailPattern = /^[a-zA-Z0-9._%+-]+@(gmail|yahoo|hotmail|outlook)\.(com|in)$/;
        const emailError = $('#email_error');
        
        if (this.value.trim() === '') {
            emailError.addClass('hidden');
        } 
        else if (!emailPattern.test(this.value)) {
            emailError.removeClass('hidden');
            emailError.text('Only Gmail, Yahoo, Hotmail, and Outlook email formats are allowed.');
        } 
        else {
            emailError.addClass('hidden');
        }
    });
    
    // Mobile number validation
    $('#mobile').on('input', function() {
        const mobileError = $('#mobile_error');
        const mobileValue = this.value.trim();
        
        if (mobileValue === '') {
            mobileError.addClass('hidden');
        }
        else if (mobileValue.length !== 10) {
            mobileError.removeClass('hidden');
            mobileError.text('Mobile number must be exactly 10 digits');
        }
        else if (!/^[6-9][0-9]{9}$/.test(mobileValue)) {
            mobileError.removeClass('hidden');
            mobileError.text('Please enter a valid Indian mobile number');
        }
        else {
            mobileError.addClass('hidden');
        }
    });

    // Form submission
    $('#personalInfoForm').on('submit', function(e) {
        e.preventDefault();
        
        // Clear previous errors
        clearErrors();
        
        let formData = new FormData(this);
        let submitBtn = $(this).find('button[type="submit"]');
        let originalText = submitBtn.html();
        
        // Form validation
        let isValid = true;
        
        if (!$('#full_name').val().trim()) {
            showFieldError('full_name', 'Full name is required');
            isValid = false;
        }
        
        if (!$('input[name="gender"]:checked').val()) {
            showFieldError('gender', 'Please select your gender');
            isValid = false;
        }
        
        let age = $('#age').val();
        if (!age) {
            showFieldError('age', 'Age is required');
            isValid = false;
        } else if (age < 18 || age > 100) {
            showFieldError('age', 'Age must be between 18 and 100');
            isValid = false;
        }
        
        // Validate mobile if provided
        let mobile = $('#mobile').val();
        if (mobile && mobile.trim() !== '') {
            if (mobile.length !== 10) {
                showFieldError('mobile', 'Mobile number must be exactly 10 digits');
                isValid = false;
            } else if (!/^[6-9][0-9]{9}$/.test(mobile)) {
                showFieldError('mobile', 'Please enter a valid Indian mobile number');
                isValid = false;
            }
        }
        
        // Validate location if using select dropdowns
        @if(isset($locations) && count($locations) > 0)
        let locationId = $('#area_select').val();
        if (locationId) {
            // If location_id exists, ensure it's set in formData
            if (!formData.has('location_id')) {
                formData.append('location_id', locationId);
            }
        }
        @endif
        
        if (!isValid) {
            return;
        }
        
        // Show loading state
        submitBtn.html('<svg class="animate-spin h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Saving...').prop('disabled', true);
        
        $.ajax({
            url: '{{ route("employee.step1") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    showAlert(response.message, 'success');
                    
                    // If next step is defined and we're in multi-step flow
                    if (response.next_step && response.next_step > 1) {
                        setTimeout(function() {
                            window.location.href = '{{ route("employee.complete.profile") }}';
                        }, 1500);
                    } else {
                        // Reload page to show updated data
                        setTimeout(function() {
                            location.reload();
                        }, 1500);
                    }
                }
            },
            error: function(xhr) {
                submitBtn.html(originalText).prop('disabled', false);
                
                if (xhr.status === 422 && xhr.responseJSON.errors) {
                    let errors = xhr.responseJSON.errors;
                    Object.keys(errors).forEach(function(key) {
                        showFieldError(key, errors[key][0]);
                    });
                    showAlert('Please fix the errors below', 'error');
                } else {
                    showAlert(xhr.responseJSON?.message || 'Error saving personal information', 'error');
                }
            }
        });
    });
</script>
@endpush
@endsection
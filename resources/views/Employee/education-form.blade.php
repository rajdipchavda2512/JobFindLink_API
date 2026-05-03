{{-- resources/views/employee/education-form.blade.php --}}
@extends('employee.layouts')

@section('title', isset($education) ? 'Edit Education' : 'Add Education')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-yellow-50 to-orange-50 py-8 px-4">
    <div class="max-w-2xl mx-auto">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('employee.educations') }}" class="inline-flex items-center text-yellow-600 hover:text-yellow-700 font-semibold">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Education
            </a>
        </div>
        
        <!-- Alert Messages -->
        <div id="alertMessage" class="hidden mb-4 p-4 rounded-lg"></div>
        
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white">{{ isset($education) ? 'Edit Education' : 'Add New Education' }}</h2>
                        <p class="text-yellow-100 mt-1">{{ isset($education) ? 'Update your educational details' : 'Add your educational qualifications' }}</p>
                    </div>
                </div>
            </div>
            
            <form action="{{ route('employee.education.save', isset($education) ? $education->id : null) }}" method="POST" class="p-8" id="educationForm">
                @csrf
                
                <div class="space-y-6">
                    <!-- Education Level -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Education Level <span class="text-red-500">*</span></label>
                        <select name="education_level" id="education_level" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-yellow-500 transition">
                            <option value="">Select Education Level</option>
                            <option value="Below 10th" {{ old('education_level', isset($education) ? $education->education_level : '') == 'Below 10th' ? 'selected' : '' }}>Below 10th</option>
                            <option value="10th" {{ old('education_level', isset($education) ? $education->education_level : '') == '10th' ? 'selected' : '' }}>10th Pass</option>
                            <option value="12th" {{ old('education_level', isset($education) ? $education->education_level : '') == '12th' ? 'selected' : '' }}>12th Pass</option>
                            <option value="Diploma" {{ old('education_level', isset($education) ? $education->education_level : '') == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                            <option value="Graduate" {{ old('education_level', isset($education) ? $education->education_level : '') == 'Graduate' ? 'selected' : '' }}>Graduate</option>
                            <option value="Post Graduate" {{ old('education_level', isset($education) ? $education->education_level : '') == 'Post Graduate' ? 'selected' : '' }}>Post Graduate</option>
                            <option value="PhD" {{ old('education_level', isset($education) ? $education->education_level : '') == 'PhD' ? 'selected' : '' }}>PhD</option>
                        </select>
                        <p class="text-red-500 text-xs mt-1 hidden" id="education_level_error"></p>
                    </div>
                    
                    <!-- Dynamic Education Fields Container -->
                    <div id="education_fields_container"></div>
                    
                    <!-- Hidden field to store JSON data -->
                    <input type="hidden" name="educations_data" id="educations_data">
                </div>
                
                <!-- Form Actions -->
                <div class="flex justify-end gap-3 pt-6 mt-6 border-t">
                    <a href="{{ route('employee.educations') }}" 
                       class="px-6 py-2 border-2 border-gray-300 rounded-lg hover:bg-gray-50 transition font-medium">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-gradient-to-r from-yellow-500 to-orange-600 text-white rounded-lg font-semibold hover:shadow-lg transition">
                        {{ isset($education) ? 'Update Education' : 'Save Education' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Pass degrees data from PHP to JavaScript
    let allDegrees = @json($degrees ?? []);
    let existingEducations = @json(isset($education) && $education->educations_data ? json_decode($education->educations_data, true) : []);
    
    // Show alert message function (matching complete-profile)
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
    
    // Clear field errors
    function clearFieldError(fieldId) {
        $(`#${fieldId}`).removeClass('border-red-500');
        $(`#${fieldId}_error`).addClass('hidden').text('');
    }
    
    // Show field error
    function showFieldError(fieldId, message) {
        $(`#${fieldId}`).addClass('border-red-500');
        $(`#${fieldId}_error`).removeClass('hidden').text(message);
    }

    // Load degrees based on education level
    function loadDegreesForLevel(educationLevel, $degreeSelect, selectedDegreeId = null) {
        let degreesForLevel = [];
        
        if (educationLevel === '12th') {
            degreesForLevel = allDegrees.filter(d => 
                d.name === '12th' || d.name === 'Intermediate' || d.name === 'High School' || d.name === 'HSC'
            );
        } else if (educationLevel === 'Diploma') {
            degreesForLevel = allDegrees.filter(d => 
                d.name.toLowerCase().includes('diploma')
            );
        } else if (educationLevel === 'Graduate') {
            degreesForLevel = allDegrees.filter(d => 
                d.name === "Bachelor's" || d.name === "Bachelor of Arts" || d.name === "Bachelor of Science" || 
                d.name === "Bachelor of Commerce" || d.name === "Bachelor of Engineering" || d.name === "Bachelor of Technology" ||
                d.name.toLowerCase().includes('bachelor') || d.name === "B.A." || d.name === "B.Sc." || d.name === "B.Com." || 
                d.name === "B.E." || d.name === "B.Tech" || d.name === "BCA" || d.name === "BBA"
            );
        } else if (educationLevel === 'Post Graduate') {
            degreesForLevel = allDegrees.filter(d => 
                d.name === "Master's" || d.name === "Master of Arts" || d.name === "Master of Science" || 
                d.name === "Master of Commerce" || d.name === "Master of Engineering" || d.name === "Master of Technology" || 
                d.name === "MBA" || d.name === "MCA" || d.name.toLowerCase().includes('master') || 
                d.name === "M.A." || d.name === "M.Sc." || d.name === "M.Com." || d.name === "M.E." || d.name === "M.Tech"
            );
        } else if (educationLevel === 'PhD') {
            degreesForLevel = allDegrees.filter(d => 
                d.name.toLowerCase().includes('phd') || d.name.toLowerCase().includes('doctor') || d.name === "Doctorate"
            );
        }

        let options = '<option value="">Select Degree</option>';
        degreesForLevel.forEach(degree => {
            let selected = (selectedDegreeId && selectedDegreeId == degree.id) ? 'selected' : '';
            options += `<option value="${degree.id}" ${selected}>${degree.name}</option>`;
        });
        $degreeSelect.html(options);
        
        if (degreesForLevel.length === 0) {
            $degreeSelect.html('<option value="">No degrees available for this level</option>');
        }
    }

    // Generate dynamic fields based on selected education level
    function generateEducationFields(selectedLevel, savedData = null) {
        let container = $('#education_fields_container');
        container.empty();
        
        if (!selectedLevel) return;
        
        let fieldSets = [];
        
        switch(selectedLevel) {
            case 'Below 10th':
            case '10th':
                fieldSets = [];
                break;
            case '12th':
            case 'Diploma':
            case 'Graduate':
                fieldSets = [{
                    level: selectedLevel,
                    title: selectedLevel + ' Details',
                    required: true
                }];
                break;
            case 'Post Graduate':
                fieldSets = [
                    { level: 'Graduate', title: 'Graduate Details', required: true },
                    { level: 'Post Graduate', title: 'Post Graduate Details', required: true }
                ];
                break;
            case 'PhD':
                fieldSets = [
                    { level: 'Graduate', title: 'Graduate Details', required: true },
                    { level: 'Post Graduate', title: 'Post Graduate Details', required: true },
                    { level: 'PhD', title: 'PhD Details', required: true }
                ];
                break;
            default:
                fieldSets = [];
        }
        
        if (fieldSets.length === 0) {
            container.html('<div class="text-center text-gray-500 p-4">No additional details required for this education level.</div>');
            return;
        }
        
        fieldSets.forEach((fieldSet, index) => {
            let savedEducation = savedData ? savedData.find(edu => edu.level === fieldSet.level) : null;
            
            let html = `
                <div class="education-field-set border border-gray-200 rounded-xl p-4 mb-4 bg-gray-50" data-level="${fieldSet.level}">
                    <h3 class="text-md font-semibold text-gray-800 mb-3 pb-2 border-b">${fieldSet.title}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">College / University Name <span class="text-red-500">*</span></label>
                            <input type="text" class="college-name w-full px-4 py-2 border-2 border-gray-300 rounded-xl focus:border-yellow-500" 
                                   value="${savedEducation ? (savedEducation.college || '') : ''}" 
                                   placeholder="Enter college/university name">
                            <p class="text-red-500 text-xs mt-1 hidden college-name-error"></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Degree / Course <span class="text-red-500">*</span></label>
                            <select class="degree-select w-full px-4 py-2 border-2 border-gray-300 rounded-xl focus:border-yellow-500">
                                <option value="">Select Degree</option>
                            </select>
                            <p class="text-red-500 text-xs mt-1 hidden degree-select-error"></p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Specialization (Optional)</label>
                            <input type="text" class="specialization w-full px-4 py-2 border-2 border-gray-300 rounded-xl focus:border-yellow-500" 
                                   value="${savedEducation ? (savedEducation.specialization || '') : ''}" 
                                   placeholder="e.g., Computer Science, Finance">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Passing Year</label>
                            <select class="passing-year w-full px-4 py-2 border-2 border-gray-300 rounded-xl focus:border-yellow-500">
                                <option value="">Select Year</option>`;
            
            let currentYear = new Date().getFullYear();
            for (let year = currentYear; year >= 1950; year--) {
                let selected = (savedEducation && savedEducation.passing_year == year) ? 'selected' : '';
                html += `<option value="${year}" ${selected}>${year}</option>`;
            }
            
            html += `
                            </select>
                        </div>
                    </div>
                </div>
            `;
            
            container.append(html);
        });
        
        // Load degrees for each field set
        setTimeout(function() {
            $('.education-field-set').each(function() {
                let level = $(this).data('level');
                let $degreeSelect = $(this).find('.degree-select');
                let savedEducation = savedData ? savedData.find(edu => edu.level === level) : null;
                loadDegreesForLevel(level, $degreeSelect, savedEducation ? savedEducation.degree_id : null);
            });
        }, 100);
    }

    // Collect education data from fields with validation
    function collectEducationsData() {
        let educations = [];
        let selectedLevel = $('#education_level').val();
        
        // Clear previous field errors
        $('.college-name-error').addClass('hidden').text('');
        $('.degree-select-error').addClass('hidden').text('');
        $('.college-name').removeClass('border-red-500');
        $('.degree-select').removeClass('border-red-500');
        
        if (!selectedLevel) {
            showFieldError('education_level', 'Please select education level');
            return null;
        }
        clearFieldError('education_level');
        
        if (selectedLevel === 'Below 10th' || selectedLevel === '10th') {
            return [{ level: selectedLevel }];
        }
        
        let fieldSets = $('.education-field-set');
        if (fieldSets.length === 0) {
            showAlert('Please select an education level first', 'error');
            return null;
        }
        
        let hasError = false;
        let errorMessages = [];
        
        fieldSets.each(function(index) {
            let level = $(this).data('level');
            let $collegeInput = $(this).find('.college-name');
            let $degreeSelect = $(this).find('.degree-select');
            let college = $collegeInput.val();
            let degreeId = $degreeSelect.val();
            let specialization = $(this).find('.specialization').val();
            let passingYear = $(this).find('.passing-year').val();
            
            // Reset individual field errors for this field set
            $(this).find('.college-name-error').addClass('hidden').text('');
            $(this).find('.degree-select-error').addClass('hidden').text('');
            $collegeInput.removeClass('border-red-500');
            $degreeSelect.removeClass('border-red-500');
            
            if (!college || college.trim() === '') {
                $(this).find('.college-name-error').removeClass('hidden').text(`College name is required for ${level}`);
                $collegeInput.addClass('border-red-500');
                errorMessages.push(`College name is required for ${level}`);
                hasError = true;
            }
            
            if (!degreeId || degreeId === '') {
                $(this).find('.degree-select-error').removeClass('hidden').text(`Degree is required for ${level}`);
                $degreeSelect.addClass('border-red-500');
                errorMessages.push(`Degree is required for ${level}`);
                hasError = true;
            }
            
            let eduData = { level: level, college: college?.trim() || '', degree_id: degreeId };
            if (specialization && specialization.trim()) eduData.specialization = specialization.trim();
            if (passingYear && passingYear) eduData.passing_year = passingYear;
            educations.push(eduData);
        });
        
        if (hasError) {
            // Show first error message in alert
            if (errorMessages.length > 0) {
                showAlert(errorMessages[0], 'error');
            }
            return null;
        }
        
        // Validate based on education level
        if (selectedLevel === 'Graduate' && educations.length < 1) {
            showAlert('Please fill in your graduate details', 'error');
            return null;
        }
        if (selectedLevel === 'Post Graduate' && educations.length < 2) {
            showAlert('Please fill in both Graduate and Post Graduate details', 'error');
            return null;
        }
        if (selectedLevel === 'PhD' && educations.length < 3) {
            showAlert('Please fill in Graduate, Post Graduate, and PhD details', 'error');
            return null;
        }
        
        return educations;
    }

    // Handle education level change
    $('#education_level').change(function() {
        clearFieldError('education_level');
        generateEducationFields($(this).val(), existingEducations);
    });

    // Form submission
    $('#educationForm').on('submit', function(e) {
        let educationsData = collectEducationsData();
        
        if (!educationsData) {
            e.preventDefault();
            return false;
        }
        
        $('#educations_data').val(JSON.stringify(educationsData));
        return true;
    });

    // Initialize on page load
    let initialLevel = $('#education_level').val();
    if (initialLevel) {
        generateEducationFields(initialLevel, existingEducations);
    }
    
    // Display server-side validation errors if any
    @if($errors->any())
        @foreach($errors->all() as $error)
            showAlert('{{ $error }}', 'error');
        @endforeach
    @endif
    
    @if(session('success'))
        showAlert('{{ session('success') }}', 'success');
    @endif
    
    @if(session('error'))
        showAlert('{{ session('error') }}', 'error');
    @endif
</script>
@endsection
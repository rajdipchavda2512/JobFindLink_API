{{-- resources/views/frontend/employer/complete-profile.blade.php --}}
@extends('Frontend.employer.layouts')

@section('title', 'Complete Your Company Profile - JobFindLink')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-yellow-50 py-8 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Progress Bar -->
        <div class="mb-8">
            <div class="bg-white rounded-full h-2 overflow-hidden">
                <div id="progressBar" class="bg-gradient-to-r from-blue-600 to-yellow-500 h-2 transition-all duration-500" style="width: 0%"></div>
            </div>
            <div class="flex justify-between mt-2 text-sm text-gray-600">
                <span>Company Details</span>
                <span>Documents (Optional)</span>
                <span>Preferences</span>
                <span>Complete</span>
            </div>
        </div>

        <!-- Alert Messages -->
        <div id="alertMessage" class="hidden mb-4 p-4 rounded-lg"></div>

        <!-- Form Container -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
            <form id="profileForm" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- STEP 0: COMPANY DETAILS -->
                <div class="step" data-step="0">
                    <div class="bg-gradient-to-r from-blue-600 to-yellow-500 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Company Details</h2>
                        <p class="text-blue-100 mt-1">Tell us about your company</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <!-- Row 1: Company Name & Work Email -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Company Name <span class="text-red-500">*</span></label>
                                    <input type="text" name="company_name" id="company_name" 
                                           class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-yellow-500 transition"
                                           placeholder="Enter your company name" value="{{ old('company_name', $profile->company_name ?? '') }}">
                                    <p class="text-red-500 text-xs mt-1 hidden" id="company_name_error"></p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Work Email <span class="text-red-500">*</span></label>
                                    <input type="email" name="work_email" id="work_email" 
                                           class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500 focus:ring-yellow-500 transition"
                                           placeholder="contact@yourcompany.com" value="{{ old('work_email', $profile->work_email ?? '') }}">
                                    <p class="text-red-500 text-xs mt-1 hidden" id="work_email_error"></p>
                                </div>
                            </div>

                            <!-- Row 2: Industry Sector & Your Designation (Now dropdown for designation) -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Industry Sector <span class="text-red-500">*</span></label>
                                    <select name="industry_type" id="industry_type" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500">
                                        <option value="">Select Industry</option>
                                        @foreach($industries as $industry)
                                            <option value="{{ $industry }}" {{ old('industry_type', $profile->industry_type ?? '') == $industry ? 'selected' : '' }}>{{ $industry }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-red-500 text-xs mt-1 hidden" id="industry_type_error"></p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Your Designation <span class="text-red-500">*</span></label>
                                    <select name="employer_designation" id="employer_designation" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500">
                                        <option value="">Select Designation</option>
                                        <option value="CEO / Managing Director" {{ old('employer_designation', $profile->employer_designation ?? '') == 'CEO / Managing Director' ? 'selected' : '' }}>CEO / Managing Director</option>
                                        <option value="HR Manager" {{ old('employer_designation', $profile->employer_designation ?? '') == 'HR Manager' ? 'selected' : '' }}>HR Manager</option>
                                        <option value="HR Executive" {{ old('employer_designation', $profile->employer_designation ?? '') == 'HR Executive' ? 'selected' : '' }}>HR Executive</option>
                                        <option value="Talent Acquisition Manager" {{ old('employer_designation', $profile->employer_designation ?? '') == 'Talent Acquisition Manager' ? 'selected' : '' }}>Talent Acquisition Manager</option>
                                        <option value="Recruitment Head" {{ old('employer_designation', $profile->employer_designation ?? '') == 'Recruitment Head' ? 'selected' : '' }}>Recruitment Head</option>
                                        <option value="Operations Manager" {{ old('employer_designation', $profile->employer_designation ?? '') == 'Operations Manager' ? 'selected' : '' }}>Operations Manager</option>
                                        <option value="Business Development Manager" {{ old('employer_designation', $profile->employer_designation ?? '') == 'Business Development Manager' ? 'selected' : '' }}>Business Development Manager</option>
                                        <option value="Department Head" {{ old('employer_designation', $profile->employer_designation ?? '') == 'Department Head' ? 'selected' : '' }}>Department Head</option>
                                        <option value="Team Lead" {{ old('employer_designation', $profile->employer_designation ?? '') == 'Team Lead' ? 'selected' : '' }}>Team Lead</option>
                                        <option value="Director" {{ old('employer_designation', $profile->employer_designation ?? '') == 'Director' ? 'selected' : '' }}>Director</option>
                                        <option value="Vice President" {{ old('employer_designation', $profile->employer_designation ?? '') == 'Vice President' ? 'selected' : '' }}>Vice President</option>
                                        <option value="President" {{ old('employer_designation', $profile->employer_designation ?? '') == 'President' ? 'selected' : '' }}>President</option>
                                        <option value="Owner / Proprietor" {{ old('employer_designation', $profile->employer_designation ?? '') == 'Owner / Proprietor' ? 'selected' : '' }}>Owner / Proprietor</option>
                                        <option value="Partner" {{ old('employer_designation', $profile->employer_designation ?? '') == 'Partner' ? 'selected' : '' }}>Partner</option>
                                        <option value="Co-Founder" {{ old('employer_designation', $profile->employer_designation ?? '') == 'Co-Founder' ? 'selected' : '' }}>Co-Founder</option>
                                        <option value="Founder" {{ old('employer_designation', $profile->employer_designation ?? '') == 'Founder' ? 'selected' : '' }}>Founder</option>
                                        <option value="Administrator" {{ old('employer_designation', $profile->employer_designation ?? '') == 'Administrator' ? 'selected' : '' }}>Administrator</option>
                                        <option value="Other" {{ old('employer_designation', $profile->employer_designation ?? '') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    <p class="text-red-500 text-xs mt-1 hidden" id="employer_designation_error"></p>
                                </div>
                            </div>

                            <!-- Row 3: Company Website & Company Size -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Company Website</label>
                                    <input type="url" name="company_website" id="company_website" 
                                           class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500 transition"
                                           placeholder="https://www.yourcompany.com" value="{{ old('company_website', $profile->company_website ?? '') }}">
                                    <p class="text-red-500 text-xs mt-1 hidden" id="company_website_error"></p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Company Size</label>
                                    <select name="company_size" id="company_size" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500">
                                        <option value="">Select Company Size</option>
                                        @foreach($companySizes as $size)
                                            <option value="{{ $size }}" {{ old('company_size', $profile->company_size ?? '') == $size ? 'selected' : '' }}>{{ $size }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-red-500 text-xs mt-1 hidden" id="company_size_error"></p>
                                </div>
                            </div>

                            <!-- Row 4: Company Logo (Full width with clear preview) -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Company Logo</label>
                                <div class="flex items-center gap-6">
                                    <div id="companyLogoPreview" class="w-24 h-24 rounded-xl bg-gray-100 overflow-hidden flex items-center justify-center border-2 border-dashed border-gray-300">
                                        @if($profile && $profile->company_logo)
                                            <img src="{{ Storage::url($profile->company_logo) }}" class="w-full h-full object-cover">
                                        @else
                                            <i class="fas fa-building text-gray-400 text-4xl"></i>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <input type="file" name="company_logo" id="company_logo" accept="image/*" class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500">
                                        <p class="text-xs text-gray-500 mt-2">Recommended: Square image, max 2MB (PNG, JPG, JPEG)</p>
                                    </div>
                                </div>
                                <p class="text-red-500 text-xs mt-1 hidden" id="company_logo_error"></p>
                            </div>

                            <!-- Row 5: Company Description -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Company Description</label>
                                <textarea name="company_description" id="company_description" rows="4" 
                                          class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:border-yellow-500 transition"
                                          placeholder="Tell us about your company, mission, and values...">{{ old('company_description', $profile->company_description ?? '') }}</textarea>
                                <p class="text-red-500 text-xs mt-1 hidden" id="company_description_error"></p>
                            </div>
                            
                            <div class="flex justify-end pt-4">
                                <button type="button" class="save-step px-8 py-3 bg-gradient-to-r from-blue-600 to-yellow-500 text-white rounded-xl hover:shadow-lg transition flex items-center gap-2 font-semibold">
                                    Save & Continue
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 1: DOCUMENTS UPLOAD (Optional) - REMOVED THE OPTIONAL MESSAGE -->
                <div class="step" data-step="1" style="display: none;">
                    <div class="bg-gradient-to-r from-blue-600 to-yellow-500 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Company Documents</h2>
                        <p class="text-blue-100 mt-1">Upload GST, PAN, or other certificates</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Upload Documents (PDF, JPG, PNG - Max 5MB each)
                                </label>
                                <label for="documents" class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-yellow-500 transition cursor-pointer block">
                                    <input type="file" name="documents" id="documents" accept=".pdf,.jpg,.jpeg,.png" multiple class="hidden">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mt-2 text-sm text-gray-600">Click to upload or drag and drop</p>
                                    <p class="text-xs text-gray-500">PDF, JPG, PNG (Max 5MB each)</p>
                                </label>
                            </div>
                            
                            <div id="documentsList" class="space-y-3">
                                @if($profile && $profile->documents && count($profile->documents) > 0)
                                    @foreach($profile->documents as $index => $doc)
                                        <div class="document-item flex items-center justify-between bg-gray-50 p-3 rounded-lg border border-gray-200" data-path="{{ $doc['path'] }}" data-name="{{ $doc['name'] }}" data-size="{{ $doc['size'] }}">
                                            <div class="flex items-center gap-3">
                                                @php
                                                    $icon = 'fa-file-pdf text-red-500';
                                                    if(isset($doc['type'])) {
                                                        if(str_contains($doc['type'], 'pdf')) $icon = 'fa-file-pdf text-red-500';
                                                        elseif(str_contains($doc['type'], 'image')) $icon = 'fa-file-image text-blue-500';
                                                        elseif(str_contains($doc['type'], 'word')) $icon = 'fa-file-word text-blue-600';
                                                    }
                                                @endphp
                                                <i class="fas {{ $icon }} text-2xl"></i>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-700">{{ $doc['name'] }}</p>
                                                    <p class="text-xs text-gray-500">{{ round($doc['size'] / 1024) }} KB</p>
                                                </div>
                                            </div>
                                            <div class="flex gap-2">
                                                <button type="button" class="download-document text-blue-500 hover:text-blue-700 p-2 rounded-lg hover:bg-blue-50 transition" title="Download" data-url="{{ Storage::url($doc['path']) }}" data-name="{{ $doc['name'] }}">
                                                    <i class="fas fa-download"></i>
                                                </button>
                                                <button type="button" class="remove-document text-red-500 hover:text-red-700 p-2 rounded-lg hover:bg-red-50 transition" title="Remove" data-path="{{ $doc['path'] }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div id="noDocumentsMsg" class="text-center text-gray-400 py-4">
                                        <i class="fas fa-cloud-upload-alt text-3xl mb-2"></i>
                                        <p>No documents uploaded yet</p>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="flex justify-between pt-4">
                                <button type="button" class="prev-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Previous</button>
                                <button type="button" id="skipDocumentsBtn" class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                                    Skip Step
                                </button>
                                <button type="button" class="save-step px-6 py-2 bg-gradient-to-r from-blue-600 to-yellow-500 text-white rounded-lg hover:shadow-lg">
                                    Save & Continue
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 2: NOTIFICATION PREFERENCES -->
                <div class="step" data-step="2" style="display: none;">
                    <div class="bg-gradient-to-r from-blue-600 to-yellow-500 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Notification Preferences</h2>
                        <p class="text-blue-100 mt-1">Choose how you want to stay updated</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:shadow-md transition">
                                    <div>
                                        <h3 class="font-semibold text-gray-800">Application Alerts</h3>
                                        <p class="text-sm text-gray-500">Receive notifications when candidates apply</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="application_alerts" id="application_alerts" class="sr-only peer toggle-switch" value="1" {{ (old('application_alerts', $profile->application_alerts ?? true) == 1 || old('application_alerts', $profile->application_alerts ?? true) === true) ? 'checked' : '' }}>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-yellow-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-yellow-500"></div>
                                    </label>
                                </div>
                                
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:shadow-md transition">
                                    <div>
                                        <h3 class="font-semibold text-gray-800">Weekly Reports</h3>
                                        <p class="text-sm text-gray-500">Get weekly performance reports via email</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="weekly_reports" id="weekly_reports" class="sr-only peer toggle-switch" value="1" {{ (old('weekly_reports', $profile->weekly_reports ?? true) == 1 || old('weekly_reports', $profile->weekly_reports ?? true) === true) ? 'checked' : '' }}>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-yellow-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-yellow-500"></div>
                                    </label>
                                </div>
                                
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:shadow-md transition">
                                    <div>
                                        <h3 class="font-semibold text-gray-800">Candidate Messages</h3>
                                        <p class="text-sm text-gray-500">Get notified when candidates message you</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" name="candidate_messages" id="candidate_messages" class="sr-only peer toggle-switch" value="1" {{ (old('candidate_messages', $profile->candidate_messages ?? true) == 1 || old('candidate_messages', $profile->candidate_messages ?? true) === true) ? 'checked' : '' }}>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-yellow-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-yellow-500"></div>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="flex justify-between pt-4">
                                <button type="button" class="prev-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Previous</button>
                                <button type="button" class="save-step px-6 py-2 bg-gradient-to-r from-blue-600 to-yellow-500 text-white rounded-lg hover:shadow-lg">Save & Continue</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: COMPLETE PROFILE -->
                <div class="step" data-step="3" style="display: none;">
                    <div class="bg-gradient-to-r from-blue-600 to-yellow-500 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Almost Done!</h2>
                        <p class="text-blue-100 mt-1">Final step to complete your profile</p>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div class="bg-green-50 border border-green-200 rounded-xl p-6 text-center">
                                <i class="fas fa-check-circle text-green-500 text-5xl mb-4"></i>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Profile Setup Complete!</h3>
                                <p class="text-gray-600">You can now start posting jobs and finding the best talent.</p>
                            </div>
                            
                            <div class="flex justify-between pt-4">
                                <button type="button" class="prev-step px-6 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Previous</button>
                                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-yellow-500 text-white rounded-lg hover:shadow-lg">Complete Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let currentStep = 0;
    let totalSteps = 4;
    let isSaving = false;
    
    function showAlert(message, type = 'error') {
        let alertDiv = $('#alertMessage');
        alertDiv.removeClass('hidden bg-green-100 text-green-700 bg-red-100 text-red-700 bg-yellow-100 text-yellow-700');
        
        if (type === 'success') {
            alertDiv.addClass('bg-green-100 text-green-700');
        } else if (type === 'warning') {
            alertDiv.addClass('bg-yellow-100 text-yellow-700');
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
        
        setTimeout(() => alertDiv.addClass('hidden'), 5000);
    }
    
    function showStep(step) {
        $('.step').hide();
        $(`.step[data-step="${step}"]`).show();
        
        let progressPercent = ((step + 1) / totalSteps) * 100;
        $('#progressBar').css('width', progressPercent + '%');
    }
    
    function clearErrors() {
        $('[id$="_error"]').addClass('hidden').text('');
        $('input, select, textarea').removeClass('border-red-500');
    }
    
    function showFieldError(field, message) {
        $(`#${field}_error`).removeClass('hidden').text(message);
        $(`#${field}`).addClass('border-red-500');
    }
    
    function validateStep(step) {
        let isValid = true;
        clearErrors();
        
        if (step === 0) {
            if (!$('#company_name').val().trim()) {
                showFieldError('company_name', 'Company name is required');
                isValid = false;
            }
            if (!$('#work_email').val().trim()) {
                showFieldError('work_email', 'Work email is required');
                isValid = false;
            }
            if (!$('#industry_type').val()) {
                showFieldError('industry_type', 'Please select industry sector');
                isValid = false;
            }
            if (!$('#employer_designation').val()) {
                showFieldError('employer_designation', 'Please select your designation');
                isValid = false;
            }
        }
        
        return isValid;
    }
    
    // Company Logo Preview
    $('#company_logo').change(function() {
        let file = this.files[0];
        if (file) {
            if (file.size > 2 * 1024 * 1024) {
                showAlert('Logo must be less than 2MB', 'error');
                $(this).val('');
                return;
            }
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#companyLogoPreview').html(`<img src="${e.target.result}" class="w-full h-full object-cover">`);
            };
            reader.readAsDataURL(file);
        }
    });
    
    function saveStep(step) {
        if (isSaving) return;
        
        if (!validateStep(step)) return;
        
        isSaving = true;
        let formData = new FormData();
        
        if (step === 0) {
            formData.append('company_name', $('#company_name').val());
            formData.append('work_email', $('#work_email').val());
            formData.append('industry_type', $('#industry_type').val());
            formData.append('company_size', $('#company_size').val());
            formData.append('company_website', $('#company_website').val());
            formData.append('company_description', $('#company_description').val());
            formData.append('employer_designation', $('#employer_designation').val());
            
            let logoFile = $('#company_logo')[0].files[0];
            if (logoFile) formData.append('company_logo', logoFile);
            
            let saveBtn = $('.save-step').filter(':visible');
            let originalText = saveBtn.html();
            saveBtn.html('<div class="loading-spinner mr-2"></div>Saving...').prop('disabled', true);
            
            $.ajax({
                url: '{{ route("employer.save.company") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                success: function(response) {
                    if (response.success) {
                        showAlert(response.message, 'success');
                        currentStep = 1;
                        showStep(currentStep);
                    }
                    saveBtn.html(originalText).prop('disabled', false);
                    isSaving = false;
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON?.errors;
                    if (errors) {
                        Object.keys(errors).forEach(key => {
                            showFieldError(key, errors[key][0]);
                        });
                    } else {
                        showAlert(xhr.responseJSON?.message || 'Error saving data.');
                    }
                    saveBtn.html(originalText).prop('disabled', false);
                    isSaving = false;
                }
            });
        }
        
        if (step === 1) {
            let files = $('#documents')[0].files;
            if (files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    formData.append('documents[]', files[i]);
                }
            }
            
            let saveBtn = $('.save-step').filter(':visible');
            let originalText = saveBtn.html();
            saveBtn.html('<div class="loading-spinner mr-2"></div>Uploading...').prop('disabled', true);
            
            $.ajax({
                url: '{{ route("employer.upload.documents") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                success: function(response) {
                    if (response.success) {
                        showAlert(response.message, 'success');
                        updateDocumentsList(response.documents);
                        currentStep = 2;
                        showStep(currentStep);
                    }
                    saveBtn.html(originalText).prop('disabled', false);
                    isSaving = false;
                },
                error: function(xhr) {
                    showAlert(xhr.responseJSON?.message || 'Error uploading documents.', 'error');
                    saveBtn.html(originalText).prop('disabled', false);
                    isSaving = false;
                }
            });
        }
        
        if (step === 2) {
            // Get checkbox values - properly formatted as boolean/0/1
            let applicationAlerts = $('#application_alerts').is(':checked') ? 1 : 0;
            let weeklyReports = $('#weekly_reports').is(':checked') ? 1 : 0;
            let candidateMessages = $('#candidate_messages').is(':checked') ? 1 : 0;
            
            formData.append('application_alerts', applicationAlerts);
            formData.append('weekly_reports', weeklyReports);
            formData.append('candidate_messages', candidateMessages);
            
            let saveBtn = $('.save-step').filter(':visible');
            let originalText = saveBtn.html();
            saveBtn.html('<div class="loading-spinner mr-2"></div>Saving...').prop('disabled', true);
            
            $.ajax({
                url: '{{ route("employer.save.preferences") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                success: function(response) {
                    if (response.success) {
                        showAlert(response.message, 'success');
                        currentStep = 3;
                        showStep(currentStep);
                    }
                    saveBtn.html(originalText).prop('disabled', false);
                    isSaving = false;
                },
                error: function(xhr) {
                    showAlert(xhr.responseJSON?.message || 'Error saving preferences.', 'error');
                    saveBtn.html(originalText).prop('disabled', false);
                    isSaving = false;
                }
            });
        }
    }
    
    // Skip Documents Step
    $('#skipDocumentsBtn').on('click', function() {
        let skipBtn = $(this);
        skipBtn.html('<div class="loading-spinner mr-2"></div>Processing...').prop('disabled', true);
        
        $.ajax({
            url: '',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                next_step: 2
            },
            success: function(response) {
                if (response.success) {
                    showAlert(response.message, 'warning');
                    currentStep = 2;
                    showStep(currentStep);
                }
                skipBtn.html('Skip Step').prop('disabled', false);
            },
            error: function() {
                showAlert('Error skipping step', 'error');
                skipBtn.html('Skip Step').prop('disabled', false);
            }
        });
    });
    
    function updateDocumentsList(documents) {
        let container = $('#documentsList');
        container.empty();
        
        if (documents && documents.length > 0) {
            documents.forEach((doc, index) => {
                let icon = 'fa-file-pdf text-red-500';
                if (doc.type) {
                    if (doc.type.includes('pdf')) icon = 'fa-file-pdf text-red-500';
                    else if (doc.type.includes('image')) icon = 'fa-file-image text-blue-500';
                    else if (doc.type.includes('word')) icon = 'fa-file-word text-blue-600';
                }
                
                // Create full URL for download
                let downloadUrl = '/storage/' + doc.path;
                
                container.append(`
                    <div class="document-item flex items-center justify-between bg-gray-50 p-3 rounded-lg border border-gray-200" data-path="${doc.path}" data-name="${doc.name}" data-size="${doc.size}">
                        <div class="flex items-center gap-3">
                            <i class="fas ${icon} text-2xl"></i>
                            <div>
                                <p class="text-sm font-medium text-gray-700">${escapeHtml(doc.name)}</p>
                                <p class="text-xs text-gray-500">${Math.round(doc.size / 1024)} KB</p>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <button type="button" class="download-document text-blue-500 hover:text-blue-700 p-2 rounded-lg hover:bg-blue-50 transition" title="Download" data-url="${downloadUrl}" data-name="${escapeHtml(doc.name)}">
                                <i class="fas fa-download"></i>
                            </button>
                            <button type="button" class="remove-document text-red-500 hover:text-red-700 p-2 rounded-lg hover:bg-red-50 transition" title="Remove" data-path="${doc.path}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                `);
            });
        } else {
            container.html(`
                <div id="noDocumentsMsg" class="text-center text-gray-400 py-4">
                    <i class="fas fa-cloud-upload-alt text-3xl mb-2"></i>
                    <p>No documents uploaded yet</p>
                </div>
            `);
        }
    }
    
    function escapeHtml(text) {
        if (!text) return '';
        return text.replace(/[&<>]/g, function(m) {
            if (m === '&') return '&amp;';
            if (m === '<') return '&lt;';
            if (m === '>') return '&gt;';
            return m;
        });
    }
    
    $(document).ready(function() {
        showStep(0);
        
        $('.save-step').on('click', function(e) {
            e.preventDefault();
            saveStep(currentStep);
        });
        
        $('.prev-step').on('click', function(e) {
            e.preventDefault();
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });
        
        // Document download handler
        $(document).on('click', '.download-document', function(e) {
            e.preventDefault();
            e.stopPropagation();
            let url = $(this).data('url');
            let name = $(this).data('name');
            
            // Create temporary link for download
            let link = document.createElement('a');
            link.href = url;
            link.download = name;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
        
        // Document remove handler
        $(document).on('click', '.remove-document', function() {
            let docPath = $(this).data('path');
            
            if (confirm('Are you sure you want to delete this document?')) {
                $.ajax({
                    url: '{{ route("employer.delete.document") }}',
                    type: 'POST',
                    data: {
                        document_path: docPath,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            showAlert(response.message, 'success');
                            updateDocumentsList(response.documents);
                        }
                    },
                    error: function(xhr) {
                        showAlert(xhr.responseJSON?.message || 'Error deleting document.', 'error');
                    }
                });
            }
        });
        
        $('#profileForm').on('submit', function(e) {
            e.preventDefault();
            
            let formData = new FormData();
            formData.append('full_name', $('#company_name').val());
            formData.append('email', $('#work_email').val());
            formData.append('_token', '{{ csrf_token() }}');
            
            let submitBtn = $(this).find('button[type="submit"]');
            let originalText = submitBtn.html();
            submitBtn.html('<div class="loading-spinner mr-2"></div>Completing...').prop('disabled', true);
            
            $.ajax({
                url: '{{ route("employer.complete.profile.post") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.redirect) {
                        window.location.href = response.redirect;
                    }
                },
                error: function(xhr) {
                    showAlert(xhr.responseJSON?.message || 'Error completing profile.', 'error');
                    submitBtn.html(originalText).prop('disabled', false);
                }
            });
        });
        
        // Debug: Log checkbox values on page load
        console.log('Application Alerts:', $('#application_alerts').is(':checked'));
        console.log('Weekly Reports:', $('#weekly_reports').is(':checked'));
        console.log('Candidate Messages:', $('#candidate_messages').is(':checked'));
    });
</script>

<style>
    .loading-spinner {
        display: inline-block;
        width: 16px;
        height: 16px;
        border: 2px solid rgba(255,255,255,0.3);
        border-radius: 50%;
        border-top-color: white;
        animation: spin 0.6s linear infinite;
    }
    
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    
    /* Toggle switch styles */
    .toggle-switch:checked + div {
        background-color: #f59e0b;
    }
    
    .document-item {
        transition: all 0.2s ease;
    }
    
    .document-item:hover {
        background-color: #f9fafb;
        border-color: #f59e0b;
    }
</style>
@endsection
{{-- resources/views/profile/complete-profile.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Profile - Job Find Link</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #2563EB 0%, #1E40AF 100%);
        }
        
        .upload-area {
            border: 2px dashed #cbd5e1;
            transition: all 0.3s ease;
        }
        
        .upload-area:hover {
            border-color: #2563EB;
            background-color: #f0f9ff;
        }
        
        .company-logo {
            transition: all 0.3s ease;
        }
        
        .company-logo:hover {
            transform: translateY(-2px);
        }
        
        .benefit-item {
            transition: all 0.3s ease;
        }
        
        .benefit-item:hover {
            transform: translateX(5px);
            color: #2563EB;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    
    <div class="container mx-auto px-4 py-8 md:py-12">
        <div class="max-w-6xl mx-auto">
            
            <!-- Header -->
            <div class="text-center mb-8 fade-in-up">
                <div class="inline-block">
                    <div class="w-16 h-16 gradient-bg rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <i class="fas fa-user-check text-white text-2xl"></i>
                    </div>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-2">Complete your profile!</h1>
                <p class="text-gray-600 text-lg">Let's get you started with your career journey</p>
            </div>
            
            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 fade-in-up">
                
                <!-- Left Column - Benefits -->
                <div class="space-y-6">
                    <!-- Benefits Card -->
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">Why complete your profile?</h2>
                        
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3 p-3 rounded-lg hover:bg-blue-50 transition">
                                <div class="w-10 h-10 gradient-bg rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-bullseye text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Personalised job matches</p>
                                    <p class="text-sm text-gray-500">Get jobs tailored to your skills</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3 p-3 rounded-lg hover:bg-blue-50 transition">
                                <div class="w-10 h-10 gradient-bg rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-handshake text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Direct connect with HRs</p>
                                    <p class="text-sm text-gray-500">Get noticed by top recruiters</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3 p-3 rounded-lg hover:bg-blue-50 transition">
                                <div class="w-10 h-10 gradient-bg rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-bell text-white text-sm"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Latest updates on the job</p>
                                    <p class="text-sm text-gray-500">Stay ahead with real-time alerts</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Trusted Companies -->
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <p class="text-center text-gray-600 text-sm mb-6">
                            Trusted by over 2 lakhs+ companies
                        </p>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="company-logo text-center p-3 bg-gray-50 rounded-lg cursor-pointer">
                                <i class="fas fa-shopping-cart text-blue-600 text-xl mb-1"></i>
                                <p class="font-semibold text-gray-700 text-sm">Paytm</p>
                            </div>
                            <div class="company-logo text-center p-3 bg-gray-50 rounded-lg cursor-pointer">
                                <i class="fas fa-car text-gray-700 text-xl mb-1"></i>
                                <p class="font-semibold text-gray-700 text-sm">Uber</p>
                            </div>
                            <div class="company-logo text-center p-3 bg-gray-50 rounded-lg cursor-pointer">
                                <i class="fas fa-shopping-bag text-green-600 text-xl mb-1"></i>
                                <p class="font-semibold text-gray-700 text-sm">Grab</p>
                            </div>
                            <div class="company-logo text-center p-3 bg-gray-50 rounded-lg cursor-pointer">
                                <i class="fas fa-utensils text-red-500 text-xl mb-1"></i>
                                <p class="font-semibold text-gray-700 text-sm">Licious</p>
                            </div>
                            <div class="company-logo text-center p-3 bg-gray-50 rounded-lg cursor-pointer">
                                <i class="fas fa-chart-line text-purple-600 text-xl mb-1"></i>
                                <p class="font-semibold text-gray-700 text-sm">TATA AIA</p>
                            </div>
                            <div class="company-logo text-center p-3 bg-gray-50 rounded-lg cursor-pointer">
                                <i class="fas fa-pizza-slice text-orange-500 text-xl mb-1"></i>
                                <p class="font-semibold text-gray-700 text-sm">zomato</p>
                            </div>
                            <div class="company-logo text-center p-3 bg-gray-50 rounded-lg cursor-pointer">
                                <i class="fas fa-sun text-yellow-500 text-xl mb-1"></i>
                                <p class="font-semibold text-gray-700 text-sm">SUNZO</p>
                            </div>
                            <div class="company-logo text-center p-3 bg-gray-50 rounded-lg cursor-pointer">
                                <i class="fas fa-plus text-gray-500 text-xl mb-1"></i>
                                <p class="font-semibold text-gray-700 text-sm">5000+</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Column - Resume Upload -->
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 gradient-bg rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-file-alt text-white text-3xl"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-800">Resume</h2>
                    </div>
                    
                    <!-- Upload Section -->
                    <div class="text-center">
                        <div class="upload-area rounded-2xl p-8 cursor-pointer" id="uploadArea">
                            <input type="file" id="resumeInput" accept=".pdf,.doc,.docx" class="hidden">
                            <div class="text-center">
                                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-cloud-upload-alt text-blue-600 text-3xl"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Upload your resume!</h3>
                                <p class="text-gray-600 mb-2">Receive 2x job offers after uploading</p>
                                <div class="flex items-center justify-center text-gray-500 text-sm mb-4">
                                    <i class="fas fa-folder-open mr-2"></i>
                                    <span>Takes less than a min to upload</span>
                                </div>
                                <div class="bg-gray-50 rounded-lg p-3 mb-4">
                                    <p class="text-xs text-gray-500">
                                        <i class="fas fa-file-pdf mr-1"></i> Upload .pdf or .docx file only
                                        <br>(Max file size: 5 MB)
                                    </p>
                                </div>
                                <button type="button" id="uploadBtn" class="gradient-bg text-white px-6 py-2 rounded-lg font-semibold hover:shadow-lg transition">
                                    <i class="fas fa-upload mr-2"></i>Choose File
                                </button>
                            </div>
                        </div>
                        
                        <!-- Uploaded File Info -->
                        <div id="fileInfo" class="hidden mt-4 p-4 bg-green-50 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <i class="fas fa-file-pdf text-green-600 text-2xl"></i>
                                    <div class="text-left">
                                        <p id="fileName" class="font-semibold text-gray-800"></p>
                                        <p id="fileSize" class="text-xs text-gray-500"></p>
                                    </div>
                                </div>
                                <button id="removeFile" class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Benefits List -->
                    <div class="mt-8 space-y-3">
                        <div class="benefit-item flex items-center space-x-3 text-gray-700">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="text-sm">Unlock jobs from top companies faster</span>
                        </div>
                        <div class="benefit-item flex items-center space-x-3 text-gray-700">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="text-sm">Get direct calls from top HRs</span>
                        </div>
                        <div class="benefit-item flex items-center space-x-3 text-gray-700">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span class="text-sm">Get jobs specifically suited for your role and experience level</span>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex gap-4 mt-8">
                        <button id="skipBtn" class="flex-1 bg-gray-200 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                            Skip
                        </button>
                        <button id="selectBtn" class="flex-1 gradient-bg text-white py-3 rounded-lg font-semibold hover:shadow-lg transition" disabled>
                            Select
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer Search Bar -->
    <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 shadow-lg">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center space-x-3">
                <i class="fas fa-search text-gray-400"></i>
                <input type="text" 
                       placeholder="Type here to search" 
                       class="flex-1 outline-none text-gray-600">
                <button class="text-blue-600 font-semibold">Search</button>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let selectedFile = null;
            
            // Upload button click
            $('#uploadBtn, #uploadArea').click(function() {
                $('#resumeInput').click();
            });
            
            // File selection
            $('#resumeInput').change(function(e) {
                const file = e.target.files[0];
                if (file) {
                    // Validate file type
                    const validTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                    if (!validTypes.includes(file.type)) {
                        alert('Please upload PDF or DOCX file only');
                        return;
                    }
                    
                    // Validate file size (5MB)
                    if (file.size > 5 * 1024 * 1024) {
                        alert('File size must be less than 5MB');
                        return;
                    }
                    
                    selectedFile = file;
                    
                    // Display file info
                    $('#fileName').text(file.name);
                    const fileSizeKB = (file.size / 1024).toFixed(1);
                    $('#fileSize').text(`${fileSizeKB} KB`);
                    $('#fileInfo').removeClass('hidden').show();
                    
                    // Enable select button
                    $('#selectBtn').prop('disabled', false);
                    $('#selectBtn').addClass('hover:shadow-lg');
                }
            });
            
            // Remove file
            $('#removeFile').click(function() {
                selectedFile = null;
                $('#resumeInput').val('');
                $('#fileInfo').addClass('hidden');
                $('#selectBtn').prop('disabled', true);
            });
            
            // Skip button
            $('#skipBtn').click(function() {
                if (confirm('Are you sure you want to skip? You can upload your resume later.')) {
                    alert('Profile setup skipped. You can complete it later.');
                    // Redirect to dashboard
                    // window.location.href = '/dashboard';
                }
            });
            
            // Select button (Submit)
            $('#selectBtn').click(function() {
                if (selectedFile) {
                    // Show loading state
                    const btn = $(this);
                    const originalText = btn.text();
                    btn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Uploading...');
                    btn.prop('disabled', true);
                    
                    // Simulate upload (replace with actual AJAX)
                    const formData = new FormData();
                    formData.append('resume', selectedFile);
                    
                    // Example AJAX call (uncomment in production)
                    /*
                    $.ajax({
                        url: '{{ route("profile.upload.resume") }}',
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if(response.success) {
                                alert('Resume uploaded successfully! Profile completed.');
                                window.location.href = '/dashboard';
                            }
                        },
                        error: function() {
                            alert('Error uploading resume. Please try again.');
                        }
                    });
                    */
                    
                    // Demo timeout
                    setTimeout(() => {
                        alert('Resume uploaded successfully! Profile completed.');
                        btn.html(originalText);
                        btn.prop('disabled', false);
                        // window.location.href = '/dashboard';
                    }, 1500);
                } else {
                    alert('Please upload your resume first');
                }
            });
            
            // Drag and drop functionality
            const uploadArea = document.getElementById('uploadArea');
            
            uploadArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadArea.style.borderColor = '#2563EB';
                uploadArea.style.backgroundColor = '#f0f9ff';
            });
            
            uploadArea.addEventListener('dragleave', (e) => {
                e.preventDefault();
                uploadArea.style.borderColor = '#cbd5e1';
                uploadArea.style.backgroundColor = 'transparent';
            });
            
            uploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadArea.style.borderColor = '#cbd5e1';
                uploadArea.style.backgroundColor = 'transparent';
                
                const file = e.dataTransfer.files[0];
                if (file) {
                    const event = { target: { files: [file] } };
                    $('#resumeInput').trigger('change', event);
                }
            });
        });
    </script>
</body>
</html>
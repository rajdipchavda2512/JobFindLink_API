<?php
// app/Http/Controllers/Frontend/Employer/EmployerController.php

namespace App\Http\Controllers\Frontend\Employer;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\EmployerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EmployerController extends Controller
{
    /**
     * Show complete profile form
     */
    public function showCompleteProfileForm()
    {
        // Use 'employer' guard instead of 'web'
        $employer = Auth::guard('web')->user();
        
        // Get or create profile to avoid null
        $profile = EmployerProfile::firstOrCreate(
            ['user_id' => $employer->id],
            [
                'company_name' => $employer->company_name ?? '',
                'work_email' => $employer->email ?? '',
                'application_alerts' => true,
                'weekly_reports' => true,
                'candidate_messages' => true,
            ]
        );
        
        // Industry types for dropdown
        $industries = [
            'Information Technology', 'Manufacturing', 'Healthcare', 'Education',
            'Finance', 'Real Estate', 'Retail', 'Hospitality', 'Transportation',
            'Construction', 'Consulting', 'Marketing', 'Telecommunications', 'Other'
        ];
        
        // Company sizes
        $companySizes = [
            '1-10 employees', '11-50 employees', '51-200 employees', 
            '201-500 employees', '501-1000 employees', '1000+ employees'
        ];
        
        return view('frontend.employer.complete-profile', compact('employer', 'profile', 'industries', 'companySizes'));
    }

    /**
     * Save company details (Step 1)
     */
   /**
 * Save company details (Step 1)
 */
public function saveCompanyDetails(Request $request)
{
    $request->validate([
        'company_name' => 'required|string|max:255',
        'work_email' => 'required|email',
        'industry_type' => 'nullable|string|max:255',
        'company_size' => 'nullable|string|max:100',
        'company_website' => 'nullable|url|max:255',
        'company_description' => 'nullable|string',
        'employer_designation' => 'nullable|string|max:255',
    ]);

    // Use 'web' guard
    $employer = Auth::guard('web')->user();
    
    // Update employer basic info
    $employer->update([
        'company_name' => $request->company_name,
        'email' => $request->work_email,
        'full_name' => $request->company_name, // Update full_name for profile completion check
        'name' => $request->company_name, // Update name from default
    ]);
    
    // Create or update profile
    $profile = EmployerProfile::updateOrCreate(
        ['user_id' => $employer->id],
        [
            'company_name' => $request->company_name,
            'work_email' => $request->work_email,
            'industry_type' => $request->industry_type,
            'company_size' => $request->company_size,
            'company_website' => $request->company_website,
            'company_description' => $request->company_description,
            'employer_designation' => $request->employer_designation,
        ]
    );

    return response()->json([
        'success' => true,
        'message' => 'Company details saved successfully!',
        'next_step' => 1
    ]);
}

    /**
     * Upload documents (Step 2)
     */
    public function uploadDocuments(Request $request)
    {
        $request->validate([
            'documents.*' => 'file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        // Use 'employer' guard
        $employer = Auth::guard('web')->user();
        
        // Get or create profile
        $profile = EmployerProfile::firstOrCreate(
            ['user_id' => $employer->id],
            [
                'company_name' => $employer->company_name ?? '',
                'work_email' => $employer->email ?? '',
            ]
        );
        
        $uploadedDocs = [];
        
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $doc) {
                $path = $doc->store('employer_documents/' . $employer->id, 'public');
                $uploadedDocs[] = [
                    'name' => $doc->getClientOriginalName(),
                    'path' => $path,
                    'size' => $doc->getSize(),
                    'type' => $doc->getMimeType(),
                    'uploaded_at' => now()->toDateTimeString()
                ];
            }
        }
        
        $existingDocs = $profile->documents ?? [];
        $allDocs = array_merge($existingDocs, $uploadedDocs);
        
        $profile->update([
            'documents' => $allDocs
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Documents uploaded successfully!',
            'documents' => $allDocs,
            'next_step' => 2
        ]);
    }

    /**
     * Delete document
     */
    public function deleteDocument(Request $request)
    {
        $request->validate([
            'document_path' => 'required|string'
        ]);

        // Use 'employer' guard
        $employer = Auth::guard('web')->user();
        $profile = EmployerProfile::where('user_id', $employer->id)->first();
        
        if (!$profile) {
            return response()->json([
                'success' => false,
                'message' => 'Profile not found'
            ], 404);
        }
        
        $documents = $profile->documents ?? [];
        $filteredDocs = array_filter($documents, function($doc) use ($request) {
            return $doc['path'] !== $request->document_path;
        });
        
        // Delete file from storage
        Storage::disk('public')->delete($request->document_path);
        
        $profile->update([
            'documents' => array_values($filteredDocs)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Document deleted successfully!',
            'documents' => array_values($filteredDocs)
        ]);
    }

    /**
     * Save notification preferences (Step 3)
     */
    public function savePreferences(Request $request)
    {
        $request->validate([
            'application_alerts' => 'boolean',
            'weekly_reports' => 'boolean',
            'candidate_messages' => 'boolean',
        ]);

        // Use 'employer' guard
        $employer = Auth::guard('web')->user();
        
        // Get or create profile
        $profile = EmployerProfile::firstOrCreate(
            ['user_id' => $employer->id],
            [
                'company_name' => $employer->company_name ?? '',
                'work_email' => $employer->email ?? '',
            ]
        );
        
        $profile->update([
            'application_alerts' => $request->application_alerts ?? true,
            'weekly_reports' => $request->weekly_reports ?? true,
            'candidate_messages' => $request->candidate_messages ?? true,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Preferences saved successfully!'
        ]);
    }

    /**
     * Complete profile and redirect to dashboard
     */
    public function completeProfile(Request $request)
    {
        // Use 'employer' guard
        $employer = Auth::guard('web')->user();
        
        // Update employer basic info
        $employer->update([
            'full_name' => $request->full_name,
            'email' => $request->email,
        ]);

        return response()->json([
            'success' => true,
            'redirect' => route('employer.dashboard')
        ]);
    }

    /**
     * Employer Dashboard
     */
    public function dashboard()
    {
        // Use 'employer' guard
        $employer = Auth::guard('web')->user();
        $profile = EmployerProfile::where('user_id', $employer->id)->first();
        return view('frontend.employer.dashboard', compact('employer', 'profile'));
    }
   public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('auth.mobile.form', 'employer');
    }

    /**
     * Skip step (optional)
     */
    public function skipStep(Request $request)
    {
        return response()->json([
            'success' => true,
            'next_step' => $request->next_step
        ]);
    }
}
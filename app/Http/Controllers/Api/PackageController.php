<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EmployeeProfile;
use App\Models\EmployerSubscription;
use App\Models\Package;
use App\Models\Payment;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * GET /api/packages - List all available packages
     */
    public function index()
    {
        $packages = Package::active()->get();

        return response()->json([
            'success' => true,
            'data' => $packages,
        ]);
    }

    /**
     * POST /api/payments/checkout - Initiate package payment
     */
    public function checkout(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
        ]);

        $user = $request->user();
        $package = Package::findOrFail($request->package_id);

        if (!$package->is_active) {
            return response()->json([
                'success' => false,
                'message' => 'This package is no longer available.',
            ], 422);
        }

        $payment = Payment::create([
            'employer_id' => $user->id,
            'package_id' => $package->id,
            'amount' => $package->price,
            'status' => 'pending',
        ]);

        // TODO: Integrate with actual payment gateway (Razorpay/Stripe)
        // For now, return payment info
        return response()->json([
            'success' => true,
            'message' => 'Payment initiated.',
            'data' => [
                'payment_id' => $payment->id,
                'amount' => $package->price,
                'package' => $package->name,
                'payment_url' => '#', // Gateway URL placeholder
                'order_id' => 'ORD_' . $payment->id . '_' . time(),
            ],
        ]);
    }

    /**
     * POST /api/payments/webhook - Payment gateway callback
     */
    public function webhook(Request $request)
    {
        $request->validate([
            'payment_id' => 'required|exists:payments,id',
            'status' => 'required|in:success,failed',
            'transaction_id' => 'nullable|string',
            'payment_method' => 'nullable|string',
        ]);

        $payment = Payment::findOrFail($request->payment_id);

        $payment->update([
            'status' => $request->status,
            'transaction_id' => $request->transaction_id,
            'payment_method' => $request->payment_method,
        ]);

        // On success, create subscription
        if ($request->status === 'success') {
            $package = $payment->package;

            EmployerSubscription::create([
                'employer_id' => $payment->employer_id,
                'package_id' => $package->id,
                'starts_at' => now(),
                'expires_at' => now()->addDays($package->validity_days),
                'jobs_used' => 0,
                'is_active' => true,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Payment ' . $request->status . '.',
        ]);
    }

    /**
     * GET /api/candidates/search - Search candidate database (employer)
     */
    public function searchCandidates(Request $request)
    {
        $user = $request->user();

        // Check subscription for DB access
        $subscription = $user->activeSubscription();
        if (!$subscription) {
            return response()->json([
                'success' => false,
                'message' => 'No active subscription to access candidate database.',
            ], 403);
        }

        $query = EmployeeProfile::with('user');

        if ($request->filled('skills')) {
            $skills = $request->skills;
            $query->where(function ($q) use ($skills) {
                foreach ((array) $skills as $skill) {
                    $q->orWhereJsonContains('skills', $skill);
                }
            });
        }
        if ($request->filled('location')) {
            $query->whereJsonContains('preferred_locations', $request->location);
        }
        if ($request->filled('experience_type')) {
            $query->where('experience_type', $request->experience_type);
        }
        if ($request->filled('job_position')) {
            $query->where('job_position', 'like', "%{$request->job_position}%");
        }

        $limit = $subscription->package->candidate_db_access;
        $candidates = $query->take($limit)->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $candidates,
        ]);
    }
}

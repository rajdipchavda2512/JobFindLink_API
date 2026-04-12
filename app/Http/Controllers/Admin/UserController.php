<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('mobile', 'like', "%{$search}%");
            });
        }

        $users = $query->latest()->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $user->load(['employeeProfile', 'employerProfile']);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'full_name' => 'nullable|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:employee,employer,admin',
            'is_active' => 'boolean',
            'is_verified' => 'boolean',
            // Employer specific
            'company_name' => 'nullable|string|max:150',
            'industry_type' => 'nullable|string|max:100',
            'company_size' => 'nullable|string|max:50',
            'company_website' => 'nullable|string|max:255',
            'company_description' => 'nullable|string',
            'employer_designation' => 'nullable|string|max:100',
        ]);

        $user->update([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'role' => $request->role,
            'is_active' => $request->boolean('is_active'),
            'is_verified' => $request->boolean('is_verified'),
        ]);

        if ($request->role === 'employer') {
            $user->employerProfile()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'company_name' => $request->company_name,
                    'industry_type' => $request->industry_type,
                    'company_size' => $request->company_size,
                    'company_website' => $request->company_website,
                    'company_description' => $request->company_description,
                    'employer_designation' => $request->employer_designation,
                ]
            );
        }

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->isAdmin() && User::where('role', 'admin')->count() <= 1) {
            return back()->with('error', 'Cannot delete the last admin account.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}

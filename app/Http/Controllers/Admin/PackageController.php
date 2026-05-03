<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->paginate(15);
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'validity_days' => 'required|integer|min:1',
            'job_posts_allowed' => 'required|integer|min:1',
            'candidate_db_access' => 'required|integer|min:1',
            'featured_listing' => 'boolean',
        ]);

        Package::create([
            'name' => $request->name,
            'price' => $request->price,
            'validity_days' => $request->validity_days,
            'job_posts_allowed' => $request->job_posts_allowed,
            'candidate_db_access' => $request->candidate_db_access,
            'featured_listing' => $request->boolean('featured_listing'),
            'is_active' => true,
        ]);

        return redirect()->route('admin.packages.index')->with('success', 'Package created successfully.');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'validity_days' => 'required|integer|min:1',
            'job_posts_allowed' => 'required|integer|min:1',
            'candidate_db_access' => 'required|integer|min:1',
            'featured_listing' => 'boolean',
        ]);

        $package->update([
            'name' => $request->name,
            'price' => $request->price,
            'validity_days' => $request->validity_days,
            'job_posts_allowed' => $request->job_posts_allowed,
            'candidate_db_access' => $request->candidate_db_access,
            'featured_listing' => $request->boolean('featured_listing'),
        ]);

        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy(Package $package)
    {
        $package->update(['is_active' => false]);
        return redirect()->route('admin.packages.index')->with('success', 'Package deactivated successfully.');
    }
    public function toggleStatus($id)
{
    $package = Package::findOrFail($id);

    $package->is_active = !$package->is_active;
    $package->save();

    return back()->with('success', 'Package status updated successfully.');
}
}

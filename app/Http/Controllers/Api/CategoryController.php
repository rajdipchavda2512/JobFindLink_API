<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * GET /api/categories - List all categories with job counts
     *
     * Matches the Categories screen in mockup:
     * - Grid of categories with emoji, name, and job count
     * - Search capability
     */
    public function index(Request $request)
    {
        $query = Category::where('is_active', true);

        // Search categories (from search bar in mockup)
        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        $categories = $query->withCount(['jobs' => function ($q) {
            $q->where('status', 'active');
        }])
        ->orderBy('sort_order')
        ->get()
        ->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
                'icon' => $category->icon,
                'description' => $category->description,
                'jobs_count' => $category->jobs_count,
                'jobs_label' => $category->jobs_count . ' ' . ($category->jobs_count === 1 ? 'job' : 'jobs'),
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $categories,
        ]);
    }

    /**
     * GET /api/categories/{id} - Get single category with its jobs
     */
    public function show(Category $category)
    {
        $category->loadCount(['jobs' => function ($q) {
            $q->where('status', 'active');
        }]);

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
                'icon' => $category->icon,
                'description' => $category->description,
                'jobs_count' => $category->jobs_count,
            ],
        ]);
    }

    /**
     * GET /api/categories/{id}/jobs - Get jobs under a category
     */
    public function jobs(Category $category, Request $request)
    {
        $query = $category->jobs()->where('status', 'active');

        if ($request->filled('job_type')) {
            $query->where('job_type', $request->job_type);
        }
        if ($request->filled('location')) {
            $query->where('location', 'like', "%{$request->location}%");
        }
        if ($request->filled('salary_min')) {
            $query->where('salary_max', '>=', $request->salary_min);
        }

        $jobs = $query->latest()->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $jobs,
        ]);
    }
}

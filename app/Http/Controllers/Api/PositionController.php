<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * GET /api/positions
     * List all active positions (public).
     * Optional query params:
     *   - search   : filter by name (partial match)
     *   - all      : if "1", include inactive positions (admin only)
     *   - per_page : items per page (default 50, paginated when sent)
     */
    public function index(Request $request)
    {
        $query = Position::query();

        // Non-admin callers only see active positions
        $showAll = $request->boolean('all') && $request->user()?->isAdmin();

        if (!$showAll) {
            $query->where('is_active', true);
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        $query->orderBy('name');

        // Paginate when per_page is requested, otherwise return full list
        if ($request->filled('per_page')) {
            $perPage = min((int) $request->per_page, 100);
            $positions = $query->paginate($perPage);

            return response()->json([
                'success' => true,
                'data'    => $positions->items(),
                'meta'    => [
                    'total'        => $positions->total(),
                    'current_page' => $positions->currentPage(),
                    'last_page'    => $positions->lastPage(),
                    'per_page'     => $positions->perPage(),
                ],
            ]);
        }

        $positions = $query->get(['id', 'name', 'description', 'is_active']);

        return response()->json([
            'success' => true,
            'data'    => $positions,
        ]);
    }

    /**
     * GET /api/positions/{position}
     * Show a single position (public).
     */
    public function show(Position $position)
    {
        return response()->json([
            'success' => true,
            'data'    => [
                'id'          => $position->id,
                'name'        => $position->name,
                'description' => $position->description,
                'is_active'   => $position->is_active,
                'created_at'  => $position->created_at,
                'updated_at'  => $position->updated_at,
            ],
        ]);
    }

    /**
     * POST /api/positions  (admin only)
     * Create a new position.
     *
     * Body params:
     *   - name        : string, required, unique
     *   - description : string, optional
     *   - is_active   : boolean, optional (default true)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:100|unique:positions,name',
            'description' => 'nullable|string|max:500',
            'is_active'   => 'boolean',
        ]);

        $isAdmin = $request->user()?->isAdmin();

        // Non-admin users (employee / employer) can suggest positions,
        // but they go in as inactive until an admin approves them.
        if ($isAdmin) {
            $isActive = $validated['is_active'] ?? true;
            $message  = 'Position created successfully.';
        } else {
            $isActive = false; // pending admin approval
            $message  = 'Position suggestion submitted. It will be visible once approved by an admin.';
        }

        $position = Position::create([
            'name'        => $validated['name'],
            'description' => $validated['description'] ?? null,
            'is_active'   => $isActive,
        ]);

        return response()->json([
            'success'   => true,
            'message'   => $message,
            'data'      => $position,
            'pending_approval' => !$isActive,
        ], 201);
    }

    /**
     * PUT /api/positions/{position}  (admin only)
     * Update an existing position.
     *
     * Body params (all optional):
     *   - name        : string, unique (ignores current record)
     *   - description : string
     *   - is_active   : boolean
     */
    public function update(Request $request, Position $position)
    {
        $validated = $request->validate([
            'name'        => 'sometimes|required|string|max:100|unique:positions,name,' . $position->id,
            'description' => 'nullable|string|max:500',
            'is_active'   => 'sometimes|boolean',
        ]);

        $position->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Position updated successfully.',
            'data'    => $position->fresh(),
        ]);
    }

    /**
     * PATCH /api/positions/{position}/toggle-status  (admin only)
     * Toggle the is_active flag of a position.
     */
    public function toggleStatus(Position $position)
    {
        $position->update(['is_active' => !$position->is_active]);

        return response()->json([
            'success'   => true,
            'message'   => 'Position status updated.',
            'is_active' => $position->fresh()->is_active,
        ]);
    }

    /**
     * DELETE /api/positions/{position}  (admin only)
     * Delete a position.
     */
    public function destroy(Position $position)
    {
        $position->delete();

        return response()->json([
            'success' => true,
            'message' => 'Position deleted successfully.',
        ]);
    }
}

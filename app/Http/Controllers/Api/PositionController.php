<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * GET /api/positions - List all active positions
     */
    public function index(Request $request)
    {
        $query = Position::where('is_active', true);

        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        $positions = $query->orderBy('name')->get()->map(function ($position) {
            return [
                'id' => $position->id,
                'name' => $position->name,
                'description' => $position->description,
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $positions,
        ]);
    }
}

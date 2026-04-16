<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        $query = Position::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        $positions = $query->latest()->paginate(15);
        return view('admin.positions.index', compact('positions'));
    }

    public function create()
    {
        return view('admin.positions.form', ['position' => new Position()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:positions,name',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        Position::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.positions.index')->with('success', 'Position created successfully.');
    }

    public function edit(Position $position)
    {
        return view('admin.positions.form', compact('position'));
    }

    public function update(Request $request, Position $position)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:positions,name,' . $position->id,
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $position->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.positions.index')->with('success', 'Position updated successfully.');
    }

    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('admin.positions.index')->with('success', 'Position deleted successfully.');
    }
}

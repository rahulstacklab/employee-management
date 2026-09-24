<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::withCount('employees')
            ->latest()
            ->paginate(10);

        return view('designations.index', compact('designations'));
    }

    public function create()
    {
        return view('designations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:designations,name',
            'description' => 'nullable|string|max:1000',
        ]);

        Designation::create($validated);

        return redirect()
            ->route('designations.index')
            ->with('success', 'Designation created successfully.');
    }

    public function show(Designation $designation)
    {
        $designation->load([
            'employees.user',
            'employees.department',
        ]);

        return view('designations.show', compact('designation'));
    }

    public function edit(Designation $designation)
    {
        return view('designations.edit', compact('designation'));
    }

    public function update(Request $request, Designation $designation)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:designations,name,' . $designation->id,
            'description' => 'nullable|string|max:1000',
        ]);

        $designation->update($validated);

        return redirect()
            ->route('designations.index')
            ->with('success', 'Designation updated successfully.');
    }

    public function destroy(Designation $designation)
    {
        if ($designation->employees()->exists()) {
            return redirect()
                ->route('designations.index')
                ->with('error', 'Cannot delete a designation assigned to employees.');
        }

        $designation->delete();

        return redirect()
            ->route('designations.index')
            ->with('success', 'Designation deleted successfully.');
    }
}
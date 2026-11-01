<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::withCount('students')
            ->latest('dept_id')
            ->get();

        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dept_name' => 'required|string|max:255',
            'manager_id' => 'nullable|integer',
            'location_id' => 'nullable|integer'
        ]);

        Department::create($request->only([
            'dept_name',
            'manager_id',
            'location_id'
        ]));

        return redirect()->route('departments.index')
            ->with('success', 'Department created successfully!');
    }

    public function show(Department $department)
    {
        return view('departments.show', compact('department'));
    }

    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'dept_name' => 'required|string|max:255',
            'manager_id' => 'nullable|integer',
            'location_id' => 'nullable|integer'
        ]);

        $department->update($request->only([
            'dept_name',
            'manager_id',
            'location_id'
        ]));

        return redirect()->route('departments.index')
            ->with('success', 'Department updated successfully!');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('departments.index')
            ->with('success', 'Department deleted successfully!');
    }
    public function getRouteKeyName(): string
{
    return 'dept_id';
}
}

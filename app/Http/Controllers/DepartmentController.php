<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all departments from the database
        $departments = Department::all();
        // Return the view with the departments data
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view for creating a new department
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'department_head' => 'required|string|max:150',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'created_by' => 'nullable|string|max:200',
        ]);

        // Create a new department
        Department::create($request->all());

        // Redirect to the departments index with a success message
        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        // Validate input
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'department_head' => 'required|string|max:150',
        'description' => 'nullable|string',
        'is_active' => 'nullable|boolean',
        'created_by' => 'nullable|string|max:200',
    ]);
    // Handle checkbox manually since unchecked boxes are not submitted
    $validated['is_active'] = $request->has('is_active') ? 1 : 0;
    
    // Update the department
    $department->update($validated);

    // Redirect to the show page (or index if you prefer)
    return redirect()->route('departments.index', $department->id)
                     ->with('success', 'Department updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('departments.index')
                     ->with('success', 'Department deleted successfully!');
    }
}

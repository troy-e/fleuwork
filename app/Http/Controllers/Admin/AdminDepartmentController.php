<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.department.admin_department', [
            'departments' => Department::all()
        ]);
    }

    public function search(Request $request)
{
    $search = $request->input('search');

    $departments = Department::where('name', 'like', '%' . $search . '%')
        ->orWhere('desc', 'like', '%' . $search . '%')
        ->get();

    return view('admin.department.admin_department', [
        'departments' => $departments
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.department.create_department');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:departments,name',
            'desc' => 'required|string'
        ]);

        Department::create($validated);

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $department = Department::findOrFail($id);
    return view('admin.department.edit_department', [
        'title' => 'Edit Department',
        'department' => $department
    ]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $department = Department::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255|unique:departments,name,' . $id,
        'desc' => 'required|string'
    ]);

    $department->update([
        'name' => $validated['name'],
        'desc' => $validated['desc']
    ]);

    return redirect()->route('admin.departments.index')
        ->with('success', 'Department updated successfully');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('admin.departments.index')
            ->with('success', 'Department deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Grade;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::with(['department', 'students'])->get();
        return view('admin.grade.admin_grade', [
            'title' => "AdminGrade",
            'grades' => $grades,
            'search' => ''
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $grades = Grade::with(['department', 'students']);

        if ($search) {
            $grades = $grades->where(function($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhereHas('department', function($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('students', function($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        $grades = $grades->get();

        return view('admin.grade.admin_grade', [
            'title' => "AdminGrade",
            'grades' => $grades,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('admin.grade.create_grade', [
        "title" => "Create New Data",
        'grades' => Grade::all(),
        'departments' => Department::all() // Changed from 'department' to 'departments'
    ]);
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:100|unique:grades,name',
        'department_id' => 'required|exists:departments,id',
    ]);

    Grade::create([
        'name' => $validated['name'],
        'department_id' => $validated['department_id']
    ]);

    return redirect()->route('admin.grades.index')->with('success', 'Grade created successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $grade = Grade::findOrFail($id);
    $departments = Department::all(); // For department dropdown
    $grades = Grade::all(); // Add this line to get all grades for the grade dropdown
    return view('admin.grade.edit_grade', compact('grade', 'departments', 'grades')); // Pass grades to the view
}


    /**
     * Remove the specified resource from storage.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $grade = Grade::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:grades,name,' . $id,
            'department_id' => 'required|exists:departments,id'
        ]);

        $grade->update($validated);

        return redirect()->route('admin.grades.index')
            ->with('success', 'Grade updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();

        return redirect()->route('admin.grades.index')  
            ->with('success', 'Grade deleted successfully!');
    }
}

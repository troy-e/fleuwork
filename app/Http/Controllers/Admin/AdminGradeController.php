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
        $grades = Grade::with(['department'])->get();
        return view('admin.dashboard.admin-grade', [
            'title' => "AdminGrade",
            'grades' => $grades
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $grades = Grade::all();
        // return view('admin.grade.create', compact('grades'));
        return view('admin.grade.create_grade',[
            "title" => "Create New Data",
            'grades' =>  Grade::all(),
            'department' => Department::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'grade' => 'required|string|max:100|unique:grades,grade',
            //'department_id' => 'required|exists:departments,id',
            // 'grade_id'  => 'required|exists:grades,id',
            // 'department_id'  => 'required|exists:departments,id',
        ]);
        Grade::create([
            'grade' => $validated['grade'],
            'department_id' => 1
            //'department_id' => $request->department_id,

        ]);
        return redirect()->route('grades.index')->with('success', 'Grade berhasil diubah!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();

        return redirect()->route('grades.index')->with('success', 'Grade berhasil dihapus!');
    }
}

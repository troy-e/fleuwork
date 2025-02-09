<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Department;
use App\Http\Controllers\Controller;

class AdminStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $search = $request->input('search');
        $admin_students = Student::with(['grade', 'department'])->orderBy('created_at', 'desc')->paginate(25);

        return view('admin.student.admin_student', [
            'title' => 'AdminStudent',
            'students' => $admin_students
        ]);

    }
    // public function index(Request $request)
    // {
    //     $query = $request->input('query');

    //     $students = Student::query()
    //         ->when($query, function ($queryBuilder) use ($query) {
    //             $queryBuilder->where('name', 'like', '%' . $query . '%')
    //                 ->orWhere('phone', 'like', '%' . $query . '%')
    //                 ->orWhereHas('grade', function ($gradeQuery) use ($query) {
    //                     $gradeQuery->where('name', 'like', '%' . $query . '%');
    //                 })
    //                 ->orWhere('address', 'like', '%' . $query . '%');
    //         })
    //         ->with('grade')
    //         ->get();

    //     return view('admin.dashboard.admin-student', [
    //         'title' => 'Admin Student',
    //         'students' => $students
    //     ]);
    // }
    public function search(Request $request)
{
    $search = $request->input('search');  // Ambil query pencarian dari input

    $students = Student::with(['grade', 'department'])
        ->where('name', 'like', '%' . $search . '%')    // Mencari berdasarkan nama
        ->orWhere('address', 'like', '%' . $search . '%') // Mencari berdasarkan alamat
        ->orWhereHas('grade', function($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');  // Mencari berdasarkan grade
        })
        ->orderBy('created_at', 'desc')
                ->paginate(25);

        return view('admin.student.admin_student', [
            'title' => 'Student',
            'students' => $students
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $grades = Grade::all();
    $departments = Department::all();
    return view('admin.student.create_student', [
        'grades' => $grades,
        'departments' => $departments
    ]);
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string',
            'grade_id' => 'required|exists:grades,id',
            'department_id' => 'required|exists:departments,id',
        ]);

        Student::create($validated);

        return redirect()->route('admin.students.index')
            ->with('success', 'Student created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    // Fetch student with grade and department relationships
    $student = Student::with(['grade', 'department'])->find($id);

    // If student not found, redirect with error message
    if (!$student) {
        return redirect()->route('students.index')->with('error', 'Student not found.');
    }

    return view('admin.student.show_student', compact('student'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
    $grades = Grade::with('department')->get();
    $departments = Department::all();

    return view('admin.student.edit_student',[
        'title' => 'Edit Student Data',
        'student' => $student,
        'grades' => $grades,
        'departments' => $departments
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,' . $id,
        'address' => 'required|string',
        'grade_id' => 'required|exists:grades,id',
        // 'department_id' => 'required|exists:departments,id',
    ]);

    $student->update($validated);

    return redirect()->route('admin.students.index')
        ->with('success', 'Student updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect()->route('admin.students.index')
        ->with('success', 'Student deleted successfully');
}
}

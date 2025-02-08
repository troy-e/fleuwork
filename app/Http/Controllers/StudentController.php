<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Department;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with(['grade', 'department'])->get();
        // $students = Student::with(['grade', 'department'])->paginate(10);
        // $students = DB::table('students')->get();
        return view('student', [
            'title' => "Student",
            'students' => $students

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grades = Grade::all(); // Ambil semua data kelas
        $departments = Department::all(); // Ambil semua data jurusan
        return view('admin.student.create_student', compact('grades', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'grade_id' => 'required',
            'department_id' => 'required',
        ]);

        // Simpan data ke database
        Student::create($request->all());

        // Redirect kembali ke halaman student dengan pesan sukses
        return redirect()->route('student.index')->with('success', 'Data siswa berhasil ditambahkan!');
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
    public function edit($id)
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
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'grade_id'  => 'required|exists:grades,id',
            'department_id'  => 'required|exists:department,id',
            'email'     => 'required|email|max:255',
            'address'   => 'required|string|max:255',
        ]);

        // Cari data siswa berdasarkan ID
        $student = Student::findOrFail($id);

        // Update data siswa
        $student->update([
            'name'     => $validated['name'],
            'grade_id' => $validated['grade_id'],
            'department_id' => $validated['department_id'],
            'email'    => $validated['email'],
            'address'  => $validated['address'],
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect('/admin/students')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    // Ambil data siswa berdasarkan ID
    $student = Student::findOrFail($id);

        // Hapus data siswa
        $student->delete();

    // Redirect kembali ke halaman student dengan pesan sukses
    return redirect()->route('students.index')->with('success', 'Data siswa berhasil dihapus!');
}

}

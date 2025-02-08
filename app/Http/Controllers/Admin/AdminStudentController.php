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
        $admin_students = Student::with(['grade', 'department'])->get();
        
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
        ->get();

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
        // $grades = Grade::all(); // Ambil semua data kelas
        // $departments = Department::all(); // Ambil semua data jurusan
        // return view('admin.student.create_student', compact('grades', 'departments'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

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
    public function destroy(string $id)
    {
        //
    }
}

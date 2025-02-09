<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\AdminGradeController;
use App\Http\Controllers\Admin\AdminDepartmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

// Admin Routes Group
Route::prefix('admin')->name('admin.')->group(function () {
    // Student Routes
    Route::get('/students', [AdminStudentController::class, 'index'])->name('students.index');
    Route::get('/students/search', [AdminStudentController::class, 'search'])->name('students.search');
    Route::get('/students/create', [AdminStudentController::class, 'create'])->name('students.create');
    Route::post('/students', [AdminStudentController::class, 'store'])->name('students.store');
    Route::get('/students/{student}', [AdminStudentController::class, 'show'])->name('students.show');
    Route::get('/students/{student}/edit', [AdminStudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{student}', [AdminStudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [AdminStudentController::class, 'destroy'])->name('students.destroy');

    // Grade Routes
    Route::get('/grades', [AdminGradeController::class, 'index'])->name('grades.index');
    Route::get('/grades/search', [AdminGradeController::class, 'search'])->name('grades.search');
    Route::get('/grades/create', [AdminGradeController::class, 'create'])->name('grades.create');
    Route::post('/grades', [AdminGradeController::class, 'store'])->name('grades.store');
    Route::get('/grades/{grade}/edit', [AdminGradeController::class, 'edit'])->name('grades.edit');
    Route::put('/grades/{grade}', [AdminGradeController::class, 'update'])->name('grades.update');
    Route::delete('/grades/{grade}', [AdminGradeController::class, 'destroy'])->name('grades.destroy');

    // Department Routes
    Route::get('/departments', [AdminDepartmentController::class, 'index'])->name('departments.index');
    Route::get('/departments/search', [AdminDepartmentController::class, 'search'])->name('departments.search'); 
    Route::get('/departments/create', [AdminDepartmentController::class, 'create'])->name('departments.create');
    Route::post('/departments', [AdminDepartmentController::class, 'store'])->name('departments.store');
    Route::get('/departments/{department}/edit', [AdminDepartmentController::class, 'edit'])->name('departments.edit');
    Route::put('/departments/{department}', [AdminDepartmentController::class, 'update'])->name('departments.update');
    Route::delete('/departments/{department}', [AdminDepartmentController::class, 'destroy'])->name('departments.destroy');
});

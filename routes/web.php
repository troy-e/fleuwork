<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminStudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::resource('students', StudentController::class)->only(['index', 'show', 'edit', 'destroy']);

Route::prefix('admin')->group(function () {
    Route::get('/student', [AdminStudentController::class, 'index'])->name('admin.student.index');
    Route::get('/search', [AdminStudentController::class, 'search'])->name('admin.students.search');
});